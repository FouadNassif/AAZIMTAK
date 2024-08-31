@extends('components.mainLayout')
@section('title', 'AAZIMTAK')
@section('css')
    <style>
        .hero {
            background-image: url({{ asset('assets/img/welcome.jpg') }});
        }
    </style>
@endsection
@section('content')
    <div class="hero" id="home">
        <h1>Wedding planning starts here</h1>
        <p>Design a personalized website, create an all-in-one registry, and experience wedding planning the way it
            should be.</p>
        <button>Get Started</button>
    </div>

    <div class="section" id="wedding-websites">
        <img src="{{ asset('assets/img/Welcome2.jpg') }}" alt="">
        <div>
            <h2>Wedding Websites</h2>
            <p>Start a Wedding Website subscription and get everything customized to fit your unique style and needs.
                Share via Email, Text & WhatsApp! With a Bliss & Bone Wedding Website, you can communicate logistics
                without compromising on design.</p>
        </div>
    </div>

    <div class="section" id="online-wedding-invites">
        <img src="{{ asset('assets/img/Welcome3.jpg') }}" alt="">
        <div>
            <h2>Online Wedding Invites & Save the Dates</h2>
            <p>Send an Online Wedding Invitation, Save the Date, or Rehearsal Dinner Invitation. Send & share via Email,
                Text, or WhatsApp. Access thousands of assets to create a dynamic and engaging online experience and get
                your guests excited to celebrate.</p>
        </div>
    </div>

    <div class="section" id="why-aazimtak">
        <h2>Why Aazimtak?</h2>
        <p>For over 10 years, our passion for design and commitment to our customers have been the pillars of our
            family-owned business. Driven by a desire to create high-end wedding technology, Aazimtak allows both
            beginners and experts to build gorgeous wedding websites with all the tools you'll need to manage your
            event.</p>
        <p>By choosing us, you'll get modern design, flexibility, and the support of a team that cares about its
            customers and strives to make your wedding an event you'll never forget.</p>
    </div>

    <div class="section" id="testimonials">
        <h2>Testimonials</h2>
        <p>"Aazimtak made our wedding planning so much easier! The website was beautiful and easy to use." - Sarah &
            John</p>
        <p>"We loved the customization options and the support team was fantastic!" - Emily & Michael</p>
    </div>

    <div class="section" id="how-it-works">
        <h2>How It Works</h2>
        <p>1. Sign up and create your account.</p>
        <p>2. Choose a template and customize your wedding website.</p>
        <p>3. Add your guest list and send out invitations.</p>
        <p>4. Manage RSVPs and keep track of your wedding details.</p>
    </div>

    <div class="footer">
        <p>© 2024 Aazimtak. All rights reserved.</p>
    </div>
@endsection
@section('script')
    <script>
        const sections = document.querySelectorAll('.section');

        window.addEventListener('scroll', () => {
            const scrollPos = window.scrollY + window.innerHeight;

            sections.forEach(section => {
                if (scrollPos > section.offsetTop) {
                    section.classList.add('visible');
                }
            });
        });
    </script>
@endsection
