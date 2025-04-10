@extends('layout.app')
@section('main')

<h5><i class="bi bi-plus-square-fill"></i> Mail</h5>
<hr >

<div class="col-md-8">
    <form action="{{route('send.contact_mail')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-lable"> Name</lable>
                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif"  
                placeholder="Enter Product Name" value="{{old('name') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">Invaild name</div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-lable"> Mail ID</lable>
                <input type="text" name="email" id="email" class="form-control @if($errors->has('email')) {{'is-invalid'}} @endif" 
                placeholder="Enter mail" value="{{old('email') }}"/>
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" id="subject"
                   class="form-control @error('subject') is-invalid @enderror"
                   placeholder="Enter subject" value="{{ old('subject') }}">
            @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="message" class="form-lable"> message</lable>
                <input type="text" name="message" id="message" 
                class="form-control @if($errors->has('message')) {{'is-invalid'}} @endif" 
                placeholder="Enter message" value="{{old('message') }}"/>
                @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="button_link" class="form-label">Link for Button</label>
            <input type="url" name="button_link" id="button_link"
                   class="form-control @error('button_link') is-invalid @enderror"
                   placeholder="https://example.com" value="{{ old('button_link') }}">
            @error('button_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="attachment" class="form-label">Attachment</label>
            <input type="file" id="attachment" name="attachments[]" multiple
                   class="form-control @error('attachment') is-invalid @enderror">
            @error('attachment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="template" class="form-label">Choose Template</label>
               <select name="template" id="template" class="form-control" onchange="togglePreview()">
                    <option value="">-- Select Template --</option>
                    <option value="assignment" {{ old('template') === 'assignment' ? 'selected' : '' }}>Assignment Template</option>
                    <option value="greeting" {{ old('template') === 'greeting' ? 'selected' : '' }}>Greeting Template</option>
                </select>
            </div>
        </div>
    
        <div class="mb-3">
            <button type="submit" class="btn btn-dark">Send</button>
            <button type="reset" class="btn btn-danger">Clear All</button>
           <button type="button" class="btn btn-info" id="preview-btn" onclick="previewEmail()" disabled>Preview</button>
      </div>
</form>

<!-- Preview section -->
<div id="preview-section" class="mt-4" style="display:none; border: 1px solid #ddd; padding: 20px; background-color: #f8f9fa;">
    <div class="d-flex justify-content-between align-items-center">
            <h4>Email Preview</h4>
            <button type="button" class="btn btn-sm btn-danger" onclick="hidePreview()">Hide</button>
        </div>

        <div id="email-preview-content"></div>
    </div>


</div>
<script>

function togglePreview() {
        const template = document.getElementById('template').value;
        const previewBtn = document.getElementById('preview-btn');

        if (template === '') {
            previewBtn.disabled = true;
        } else {
            previewBtn.disabled = false;
        }
    }

    function previewEmail() {
        const name = document.querySelector('input[name="name"]').value;
        const email = document.querySelector('input[name="email"]').value;
        const subject = document.querySelector('input[name="subject"]').value;
        const message = document.querySelector('input[name="message"]').value;
        const button_link = document.querySelector('input[name="button_link"]').value;
        const template = document.querySelector('select[name="template"]').value;

        let html = '';

        if (template === 'assignment') {
            html = `
                <p>Hi <strong>${name}</strong>,</p>
                <p>Hope this email finds you well!</p>
                <p>As part of our evaluation process, we would like you to work on the below assignment.</p>
                <p><strong>Message:</strong><br>${message}</p>
                ${button_link ? `<p><a href="${button_link}" style="padding: 10px 20px; background: #0d6efd; color: white; text-decoration: none;">View Assignment</a></p>` : ''}
                <p><strong>Deadline:</strong><br> Please submit your assignment by <strong>12/01/2025</strong>.</p>
                <p><strong>Note:</strong><br>The assessment will take approximately 4–5 hours to complete. Kindly avoid using ChatGPT, AI tools, or open-source networks.</p>
                <p>If you have any questions, feel free to reach out!</p>
                <br><p>Thanks and Regards,<br><strong>Sridharan</strong><br>Senior HR</p>
            `;
        } else if (template === 'greeting') {
            html = `
                <h3>Hello ${name},</h3>
                <p>${message}</p>
                ${button_link ? `<p><a href="${button_link}" style="padding: 10px 20px; background: green; color: white; text-decoration: none;">Check Now</a></p>` : ''}
                <br><p>Kind regards,<br><strong>Sridharan</strong></p>
            `;
        }

        document.getElementById('email-preview-content').innerHTML = html;
        document.getElementById('preview-section').style.display = 'block';
    }
    function hidePreview() {
        document.getElementById('preview-section').style.display = 'none';
    }

    window.onload = togglePreview;
</script>

@endsection
