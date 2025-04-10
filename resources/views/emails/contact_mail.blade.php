<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f9f9f9; padding: 20px; color: #333;">

    <div style="background-color: #fff; padding: 30px; border-radius: 8px; max-width: 700px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <p>Hi <strong>{{ $contact_data['name'] }}</strong>,</p>

        <p>Hope this email finds you well!</p>

        <p>
            As part of our evaluation process, we would like you to work on the below assignment.
        </p>

        <p>
            <strong>Message:</strong><br>
            {{ $contact_data['message'] }}
        </p>

        @if(!empty($contact_data['button_link']))
            <p>
                <a href="{{ $contact_data['button_link'] }}" style="padding: 10px 20px; background: #0d6efd; color: #fff; text-decoration: none; border-radius: 4px;">
                    View Assignment
                </a>
            </p>
        @endif

        <p><strong>Deadline:</strong><br> Please submit your assignment by <strong>12/01/2025</strong>.</p>

        <p><strong>Note:</strong><br>
            The assessment will take approximately 4–5 hours to complete.<br>
            Kindly avoid using ChatGPT, AI tools, or any open-source networks.
        </p>

        <p>If you have any questions, feel free to reach out. I'm here to help!</p>

        <br>

        <p>Thanks and Regards,</p>

        <p>
            <strong>Sridharan</strong><br>
            Senior HR<br>
            <a href="http://www.google.com" target="_blank">www.google.com</a>
        </p>

        <hr style="margin-top: 30px; border: none; border-top: 1px solid #ccc;">
        <p style="font-size: 12px; color: #999;">
            This email may include confidential or proprietary information. If you received this in error, please delete it immediately.
        </p>
        @if(!empty($contact_data['attachments']))
            <p><strong>Attachments:</strong></p>
            <ul>
                @foreach($contact_data['attachments'] as $file)
                    <li>{{ $file['name'] }}</li>
                @endforeach
            </ul>
        @endif
    </div>

</body>
</html>
