<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .navbar {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .profile-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            transition: transform 0.3s, box-shadow 0.3s;
            max-width: 600px;
            width: 100%;
        }

        .profile-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #007BFF;
            margin-bottom: 15px;
            transition: transform 0.3s;
            display: block;
            margin: 0 auto;
        }

        .profile-pic:hover {
            transform: scale(1.1);
        }

        h1 {
            font-size: 1.8em;
            margin: 10px 0;
            color: #333;
            text-align: center;
            text-transform:capitalize;
        }

        p {
            color: #666;
            margin: 5px 0;
            text-align: center;
        }

        strong {
            color: #007BFF;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
            display: block;
            margin: 0 auto;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        #profileForm {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        footer {
            padding: 20px 0;
            background-color: #f7f7f7;
            color: #666;
            text-align: center;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

    </style>
</head>

<body>
@include('admin.header')
    <div class="container mt-4 fade-in">
        <div class="profile-container">
            <img src="{{ asset(Auth::user()->profile_picture ?? 'images/profile-default-image.jpg') }}"
                alt="Profile Picture" class="profile-pic" id="profilePic">

            <h1 id="username">{{ Auth::user()->name }}</h1>
            <p id="bio">ID: {{ Auth::user()->id ?? 'No bio available.' }}</p>
            <p><strong>User Type:</strong> {{ Auth::user()->usertype }}</p>

            <button id="editButton">Edit Profile Picture</button>

            <form id="profileForm" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
                <button type="submit" class="btn btn-success mt-2">Update Profile Picture</button>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('editButton').addEventListener('click', function () {
            const profileForm = document.getElementById('profileForm');
            profileForm.style.display = 'block'; // Show the form
        });

        document.getElementById('profileForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this); // Serialize the form data

            fetch('{{ route("profile.update", Auth::user()->id) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'Error updating profile picture.');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Profile picture updated successfully!');
                    window.location.reload(); // Reload to reflect changes
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred: ' + error.message);
            });
        });
    </script>
           @include('home.footer')
</body>

</html>
