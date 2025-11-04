<?php
include_once 'connection.php'; // Your database connection file

if (!isset($_SESSION['cnt_member']) || $_SESSION['cnt_member'] == 0) {
    header("Location: plans.php");
    exit();
}

// Assuming member is logged in and session contains member_id
if (!isset($_SESSION['member_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

$member_id = $_SESSION['member_id'];

// Fetch Member Biodata
$query = "SELECT * FROM member_tbl, member_detail_tbl, member_qualification_tbl, lifestyle_tbl, city_tbl, state_tbl, community_tbl, sub_community_tbl
           WHERE member_tbl.member_id = member_detail_tbl.member_id
           AND member_detail_tbl.member_detail_id = member_qualification_tbl.member_detail_id
           AND member_detail_tbl.member_detail_id = lifestyle_tbl.member_detail_id
           AND member_tbl.member_city = city_tbl.city_id
           AND city_tbl.state_id = state_tbl.state_id
           AND member_detail_tbl.member_sub_community_id = sub_community_tbl.sub_community_id
           AND sub_community_tbl.community_id = community_tbl.community_id
           AND member_tbl.member_id = $member_id";

$result = mysqli_query($conn, $query);
$member = mysqli_fetch_array($result);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/wedding_background.jpg'); /* Use the provided image */
            background-size: cover;
            background-position: center;
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #d4af37; /* Gold border */
        }
        .download-link {
            background-color: #d4af37; /* Gold color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .download-link:hover {
            background-color: #bd9339; /* Darker gold */
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        @media print {
            .download-link {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">BIODATA</h2>
            <div class="text-center mb-4">
				<?php 
					if(isset($member['member_image']))
					{
				?>
						<img src="member_profiles/<?php echo $member['member_image']; ?>" alt="Profile Image" class="profile-img">
				<?php
					}
					else
					{
				?>
						<img src="member_profiles/image_placeholder.jpg" alt="Profile Image" class="profile-img">
				<?php
					}
				?>
            </div>
            <table class="table table-bordered">
                <tr><th>Name</th><td><?php echo ucfirst($member['member_firstname']) . ' ' . ucfirst($member['member_lastname']); ?></td></tr>
                <tr><th>Gender</th><td><?php echo ucfirst($member['member_gender']); ?></td></tr>
                <tr><th>Date of Birth</th><td><?php echo date("d - M - Y" , strtotime($member['member_dob'])) . " (" . $member['member_age'] . " Y)"; ?></td></tr>
                <tr><th>Contact</th><td><?php echo $member['member_contact']; ?></td></tr>
                <tr><th>Email</th><td><?php echo $member['member_email']; ?></td></tr>
                <tr><th>Address</th><td><?php echo ucfirst($member['residential_status']) . ", " . ucfirst($member['state_name']); ?></td></tr>
                <tr><th>Community</th><td><?php echo ucfirst($member['community_name']); ?></td></tr>
                <tr><th>Sub-Community</th><td><?php echo ucfirst($member['sub_community_name']); ?></td></tr>
                <tr><th>Qualification</th><td><?php echo ucfirst($member['member_qualification']); ?></td></tr>
                <tr><th>Occupation</th><td><?php echo ucfirst($member['member_occupation']); ?></td></tr>
                <tr><th>Income</th><td><?php echo $member['member_income']; ?></td></tr>
                <tr><th>Height / Weight</th><td><?php echo $member['member_height'] . " ft.inch / " . $member['member_weight'] . " kg"; ?></td></tr>
                <tr><th>Marital Status</th><td><?php echo ucfirst($member['marital_status']); ?></td></tr>
                <tr><th>Religion</th><td><?php echo ucfirst($member['member_religion']); ?></td></tr>
                <tr><th>Food Preferences</th><td><?php echo ucfirst($member['member_diet']); ?></td></tr>
                <tr><th>Smoking</th><td><?php echo ucfirst($member['smoking_habbits']); ?></td></tr>
                <tr><th>Drinking</th><td><?php echo ucfirst($member['drinking_habbits']); ?></td></tr>
                <tr><th>Hobbies</th><td><?php echo ucfirst($member['hobbies_interest']); ?></td></tr>
                <tr><th>Languages Known</th><td><?php echo ucfirst($member['language_known']); ?></td></tr>
            </table>
        </div>
    </div>

    <!-- Button Container with Back and Download Buttons -->
    <div class="button-container">
        <a href="all_profiles.php" class="btn btn-primary">Back</a>
        <button id="download-pdf" class="download-link">
            <i class="fas fa-file-pdf"></i> Download Biodata as PDF
        </button>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- html2pdf Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            document.getElementById('download-pdf').addEventListener('click', function() {
                const element = document.querySelector('.card');
                html2pdf().from(element).save('Biodata.pdf');
            });
        });
    </script>
</body>
</html>
<?php
mysqli_close($conn);
?>
