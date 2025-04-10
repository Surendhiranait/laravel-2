<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Greetings!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f4f8; padding: 30px; color: #333;">

    <div style="max-width: 650px; margin: auto; background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #2e6da4;">Hello {{ $contact_data['name'] ?? 'there' }} 👋</h2>

        <p style="font-size: 16px;">We hope you're having a wonderful day!</p>

        <p style="font-size: 16px;">
            {{ $contact_data['message'] ?? 'Here’s a little note to say we appreciate you. Thank you for being a part of our journey.' }}
        </p>

        @if(!empty($contact_data['button_link']) && !empty($contact_data['button_text']))
            <p style="margin: 30px 0;">
                <a href="{{ $greeting_data['button_link'] }}"
                   style="background-color: #28a745; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px;">
                   {{ $contact_data['button_text'] }}
                </a>
            </p>
        @endif

        <p style="font-size: 14px; color: #555;">
            Wishing you all the best,<br>
            <strong>— The Team</strong>
        </p>

        <hr style="margin-top: 40px; border: none; border-top: 1px solid #ddd;">
        <p style="font-size: 12px; color: #999; text-align: center;">
            This is an automated message. Please do not reply to this email.
        </p>
    </div>

</body>
</html>
