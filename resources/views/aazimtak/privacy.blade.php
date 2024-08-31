@extends('components.mainLayout')
@section('title', 'AAZIMTAK - Privacy Policy')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Privacy Policy</h1>
        <p class="text-gray-600 mb-4">
            At Aazimtak, we value your privacy. This Privacy Policy explains how we collect, use, and protect your personal information. By using our services, you consent to the practices described in this policy.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">1. Information We Collect</h2>
        <p class="text-gray-600 mb-4">
            - **Personal Information**: We may collect personal information such as your name, email address, and payment details.<br>
            - **Usage Data**: We collect data on how you use our services to improve your experience.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">2. How We Use Your Information</h2>
        <p class="text-gray-600 mb-4">
            - **Service Provision**: To provide and manage our services.<br>
            - **Improvement**: To improve our website and services based on usage data.<br>
            - **Communication**: To send you updates, newsletters, and promotional materials if you have opted in.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">3. Data Sharing</h2>
        <p class="text-gray-600 mb-4">
            - **Third Parties**: We do not sell or rent your personal information to third parties. We may share data with service providers who assist us in operating our website and services.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">4. Data Security</h2>
        <p class="text-gray-600 mb-4">
            - **Protection**: We implement reasonable security measures to protect your information from unauthorized access and disclosure.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">5. Your Rights</h2>
        <p class="text-gray-600 mb-4">
            - **Access and Control**: You may access and update your personal information. You may also request the deletion of your data under certain conditions.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">6. Changes to This Policy</h2>
        <p class="text-gray-600 mb-4">
            - **Updates**: We may update this Privacy Policy from time to time. We will notify you of significant changes by posting the new policy on our website.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-4">7. Contact Us</h2>
        <p class="text-gray-600 mb-4">
            - **Support**: If you have any questions or concerns about this Privacy Policy, please contact us at [support@aazimtak.com](mailto:support@aazimtak.com).
        </p>
    </div>
</div>
@endsection
