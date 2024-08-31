function showFlashMessage(message, type = 'success') {
    // Create the flash message div
    const notificationDiv = document.createElement('div');
    notificationDiv.id = 'notification';
    notificationDiv.className = `notification fixed top-4 right-4 bg-${type === 'success' ? 'green' : 'red'}-500 p-5 border-4 border-${type === 'success' ? 'green' : 'red'}-700 shadow-lg flex items-center justify-between rounded-lg text-white`;

    // Create the message element
    const messageElement = document.createElement('h1');
    messageElement.textContent = message;

    // Create the close button
    const closeButton = document.createElement('button');
    closeButton.textContent = 'X';
    closeButton.className = 'ml-4';
    closeButton.onclick = closeNotification;

    // Create the progress bar
    const progressBar = document.createElement('div');
    progressBar.className = `progress-bar mt-2 h-2 rounded bg-${type === 'success' ? 'green' : 'red'}-700`;

    // Append elements to the notification
    notificationDiv.appendChild(messageElement);
    notificationDiv.appendChild(closeButton);
    notificationDiv.appendChild(progressBar);

    // Append the notification to the body
    document.body.appendChild(notificationDiv);
    

    // Set a timeout to remove the notification after 5 seconds
    setTimeout(() => {
        closeNotification();
    }, 5000);

    // Animate the progress bar
    progressBar.style.transition = 'width 5s linear';
    setTimeout(() => {
        progressBar.style.width = '100%';
    }, 100);
}

function closeNotification() {
    const notificationDiv = document.getElementById('notification');
    if (notificationDiv) {
        notificationDiv.remove();
    }
}
