<?php

include 'connection.php';
header('Content-Type: text/html; charset=UTF-8');

// Check if the page has already been loaded for this user and member combination
$pageLoadedKey = 'page_loaded_' . $_SESSION['member_id'] . '_' . $_GET['member_id'];
if (isset($_SESSION[$pageLoadedKey])) {
    echo "<script>
            alert('This page has already been loaded and cannot be reloaded.');
            window.location.href = 'all_profiles.php';
          </script>";
    exit();
}

if (!isset($_SESSION['cnt_member']) || $_SESSION['cnt_member'] == 0) {
    header("Location: plans.php");
    exit();
}

if (!isset($_SESSION['member_id'])) {
    die("Please log in to access Kundali matching.");
}

$loggedInUserId = $_SESSION['member_id'];

if (!isset($_GET['member_id'])) {
    die("No member selected for matching.");
}

$selectedMemberId = $_GET['member_id'];

function gunaMilan($rashi1, $rashi2) {
    $rashiMap = array(
        "Mesh" => "Aries",
        "Varishabha" => "Taurus",
        "Mithuna" => "Gemini",
        "Karka" => "Cancer",
        "Sinha" => "Leo",
        "Kanya" => "Virgo",
        "Tula" => "Libra",
        "Vrischika" => "Scorpio",
        "Dhanur" => "Sagittarius",
        "Makara" => "Capricorn",
        "Kumbha" => "Aquarius",
        "Meena" => "Pisces"
    );

    if (isset($rashiMap[$rashi1])) {
        $rashi1 = $rashiMap[$rashi1];
    }
    if (isset($rashiMap[$rashi2])) {
        $rashi2 = $rashiMap[$rashi2];
    }

    $gunaScores = array(
        "Varna" => rand(0, 1),
        "Vashya" => rand(0, 2),
        "Tara" => rand(0, 3),
        "Yoni" => rand(0, 4),
        "Graha Maitri" => rand(0, 5),
        "Gana" => rand(0, 6),
        "Bhakoot" => rand(0, 7),
        "Nadi" => rand(0, 8)
    );

    $totalScore = array_sum($gunaScores);

    return array("total" => $totalScore, "details" => $gunaScores);
}

if (!$conn) {
    die("Database connection failed.");
}

$sql = "SELECT d.member_rashi, m.member_gender, m.member_firstname, m.member_image
        FROM member_detail_tbl d
        JOIN member_tbl m ON d.member_id = m.member_id
        WHERE d.member_id = '$loggedInUserId'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);
if (!$user) {
    die("Logged-in user details not found.");
}

$user_rashi = $user['member_rashi'];
$user_gender = $user['member_gender'];
$user_name = $user['member_firstname'];
$user_image = $user['member_image'];

$sql = "SELECT d.member_rashi, m.member_gender, m.member_firstname, m.member_image
        FROM member_detail_tbl d
        JOIN member_tbl m ON d.member_id = m.member_id
        WHERE d.member_id = '$selectedMemberId'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$selectedMember = mysqli_fetch_assoc($result);
if (!$selectedMember) {
    die("Selected member details not found.");
}

$selected_rashi = $selectedMember['member_rashi'];
$selected_gender = $selectedMember['member_gender'];
$selected_name = $selectedMember['member_firstname'];
$selected_image = $selectedMember['member_image'];

$gunaResult = gunaMilan($user_rashi, $selected_rashi);
$gunaScore = $gunaResult['total'];
$gunaDetails = $gunaResult['details'];

$matchStatus = ($gunaScore >= 18) ? "✅ Good Match! Suitable for marriage." : "❌ Not a strong match.";

// Set the session variable to indicate the page has been loaded
$_SESSION[$pageLoadedKey] = true;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $WEB_TITLE; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Great Vibes', cursive;
            background: linear-gradient(135deg, #fff1eb, #ace0f9);
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: #f9f9f9;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-title {
            font-size: 2em;
            color: #555;
        }
        .result-table {
            margin-top: 20px;
        }
        .match-status {
            margin-top: 20px;
            font-size: 1.5em;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
        }
        .match-status.good {
            background-color: #d4af37;
        }
        .match-status.bad {
            background-color: #dc3545;
        }
        .progress {
            height: 20px;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #d4af37;
        }
        .download-link {
            background-color: #d4af37;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .download-link:hover {
            background-color: #b8922f;
        }
        .fa-home {
            font-size: 24px;
            color: #d4af37;
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
        }
        .fa-home:hover {
            color: #b8922f;
        }
        .infinity-symbol {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 225px;
            color: #d4af37;
            transform: translate(-50%, -50%) rotate(-181deg);
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-body position-relative">
            <button id="download-pdf" class="download-link">
                <i class="fas fa-file-pdf"></i> Download Kundali as PDF
            </button>
            <a href="all_profiles.php">
                <i class="fa fa-home"></i>
            </a>
            <h2 class="card-title text-center">Kundali Matching Result</h2>
            <div class="card mt-4" id="content-to-pdf">
                <div class="card-body">
                    <div class="d-flex justify-content-around align-items-center position-relative">
                        <div class="text-center">
                            <img src="member_profiles/<?php echo $user_image; ?>" alt="<?php echo $user_name; ?>" class="profile-image">
                            <p><strong><?php echo $user_name; ?></strong></p>
                            <p>(<?php echo $user_rashi; ?>, <?php echo $user_gender; ?>)</p>
                        </div>
                        <div class="connection-line"></div>
                        <div class="infinity-symbol">∞</div>
                        <div class="text-center">
                            <img src="member_profiles/<?php echo $selected_image; ?>" alt="<?php echo $selected_name; ?>" class="profile-image">
                            <p><strong><?php echo $selected_name; ?></strong></p>
                            <p>(<?php echo $selected_rashi; ?>, <?php echo $selected_gender; ?>)</p>
                        </div>
                    </div>
                    <h3 class="text-center mt-4">Total Compatibility Score: <?php echo $gunaScore; ?> / 36</h3>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($gunaScore / 36) * 100; ?>%" aria-valuenow="<?php echo $gunaScore; ?>" aria-valuemin="0" aria-valuemax="36"><?php echo $gunaScore; ?> / 36</div>
                    </div>
                    <h4 class="mt-4">Guna Breakdown:</h4>
                    <table class="table table-bordered result-table">
                        <thead>
                            <tr>
                                <th>Guna</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gunaDetails as $guna => $score): ?>
                                <tr>
                                    <td><?php echo $guna; ?></td>
                                    <td><span class="badge badge-primary"><?php echo $score; ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="match-status text-center <?php echo ($gunaScore >= 18) ? 'good' : 'bad'; ?>">
                        <h3><?php echo $matchStatus; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Kundali Matching Result',
                text: 'Your matching result is ready!',
                icon: 'success',
                confirmButtonText: 'OK',
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                `
            });
        });

        document.getElementById('download-pdf').addEventListener('click', function() {
            const element = document.getElementById('content-to-pdf');
            html2pdf().from(element).save('Kundali_Matching_Result.pdf');
        });
    </script>
</body>
</html>
<?php
mysqli_close($conn);
?>
