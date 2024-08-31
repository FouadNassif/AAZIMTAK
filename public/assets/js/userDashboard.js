document.getElementById('statusFilter').addEventListener('change', updateGuestList);

updateGuestList();

function updateGuestList() {
    const status = document.getElementById('statusFilter').value;
    let url = '/user/guests';

    if (status) {
        url += `?status=${status}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('guestTableBody');
            tableBody.innerHTML = '';
            data.guests.forEach(guest => {
                tableBody.innerHTML += `
                <tr>
                    <td class="p-4 border-b-2">${guest.name}</td>
                    <td class="p-4 border-b-2">${guest.wedding_link}</td>
                    <td class="p-4 border-b-2">${guest.attending_status}</td>
                    <td class="p-4 border-b-2">${guest.number_of_people}</td>
                    <td class="p-4 border-b-2">${guest.number_of_kids}</td>
                    <td class="p-4 border-b-2"><button onclick="editGuest(${guest.id})"><img src="/assets/svg/edit.svg" class="w-8"></button></td>
                </tr>
                `;
            });
        });
}

async function editGuest(guestID) {
    try {
        const response = await fetch("/user/guests/edit", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ guestID })
        });

        if (!response.ok) throw new Error("Failed to fetch guest info");

        const guest = await response.json();
        if (!guest.name) throw new Error("Invalid guest data");

        const moreInfoDiv = document.getElementById('moreInfoGuestCon');
        moreInfoDiv.innerHTML = `
            <h3 class="text-black font-bold mb-2">Guest Information</h3>
            <label><strong>Name:</strong></label>
            <input type="text" id="editGuestName" value="${guest.name}" class="w-full p-2 mb-2 border border-gray-300 rounded text-black" />
            <label><strong>Number of People:</strong></label>
            <input type="number" id="editGuestNumberOfPeople" value="${guest.number_of_people}" class="w-full p-2 mb-2 border border-gray-300 rounded text-black" />
            <label><strong>Number of Kids:</strong></label>
            <input type="number" id="editGuestNumberOfKids" value="${guest.number_of_kids}" class="w-full p-2 mb-2 border border-gray-300 rounded text-black" />
            <p><strong>Attending : </strong> ${guest.attending_status}</p>
            <p><strong>Message : </strong> ${guest.message}</p>
            <p><strong>Created at : </strong> ${guest.created_at}</p>
            <div class="flex justify-between w-full">
                <button id="saveGuestInfo" class="mt-4 p-2 bg-green-500 text-white rounded">Save</button>
                <button id="deleteGuestInfo" class="mt-4 p-2 bg-red-500 text-white rounded">Delete</button>
            </div>
        `;

        document.getElementById('saveGuestInfo').addEventListener('click', () => saveGuestInfo(guestID));
        document.getElementById('deleteGuestInfo').addEventListener('click', () => deleteGuest(guestID));

        const overlayDiv = document.getElementById('moreInfoGuestConMain');
        overlayDiv.classList.remove('hidden');

        document.getElementById('closeMoreInfoGuestCon').addEventListener('click', closeOverlay);
        overlayDiv.addEventListener('click', (e) => {
            if (e.target === overlayDiv) closeOverlay();
        });

    } catch (error) {
        console.error(error);
        showFlashMessage("An error occurred while fetching the guest info.", 'error');
    }
}

async function saveGuestInfo(guestID) {
    try {
        const name = document.getElementById('editGuestName').value;
        const numberOfPeople = document.getElementById('editGuestNumberOfPeople').value;
        const numberOfKids = document.getElementById('editGuestNumberOfKids').value;

        const response = await fetch("/user/guests/save", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ guestID, name, number_of_people: numberOfPeople, number_of_kids: numberOfKids })
        });

        if (!response.ok) throw new Error("Failed to save guest info");

        const result = await response.json();
        showFlashMessage(result.message);
        closeOverlay();
        updateGuestList();

    } catch (error) {
        console.error(error);
        showFlashMessage("An error occurred while saving the guest info.", 'error');
    }
}

async function deleteGuest(guestID) {
    if (!confirm("Are you sure you want to delete this guest?")) return;

    try {
        const response = await fetch("/user/guests/delete", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ guestID })
        });

        if (!response.ok) throw new Error("Failed to delete guest");

        const result = await response.json();
        showFlashMessage(result.message);
        closeOverlay();
        updateGuestList();

    } catch (error) {
        console.error(error);
        showFlashMessage("An error occurred while deleting the guest.", 'error');
    }
}

function closeOverlay() {
    const overlayDiv = document.getElementById('moreInfoGuestConMain');
    overlayDiv.classList.add('hidden');
}
