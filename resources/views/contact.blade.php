@extends('layouts.frontend')
@section('content')
    <div class="contact-container">
        <h1>Contact Us</h1>

        <div class="contact-info">
            <p><strong>Email:</strong> info@example.com</p>
            <p><strong>Phone:</strong> +977-9800000000</p>
            <p><strong>Address:</strong> Pokhara, Nepal</p>
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
@endsection
