<?php
$name = '';
$email = '';
$username = '';
$gender = '';
$password = '';
$confirm_password = '';
$date_of_birth = '';
$marital_status = '';
$postal_code = '';
$home_phone = '';
$mobile_phone = '';
$credit_card_number = '';
$monthly_salary = '';
$web_site_url = '';
$address = '';
$city = '';
$overall_gpa = '';
$credit_card_expiry_date = '';

$isNameValid = true;
$isUserNameValid = true;
$isEmailValid = true;
$isGenderValid = true;
$isMaritalStatus = true;
$isPasswordValid = true;
$isNewPasswordValid = true;
$isAddressValid = true;
$isCityValid = true;
$isDateOfBirthValid = true;
$isPostalCodeValid = true;
$isHomePhoneValid = true;
$isMobilePhoneValid = true;
$isCardValid = true;
$isCreditCardExpiryDateValid = true;
$isSalaryValid = true;
$isWebsiteUrlValid = true;
$isGPAValid = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $marital_status = $_POST["marital_status"];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $postal_code = $_POST['postal_code'];
    $home_phone = $_POST['home_phone'];
    $mobile_phone = $_POST['mobile_phone'];
    $credit_card_number = $_POST['credit_card_number'];
    $monthly_salary = $_POST['monthly_salary'];
    $overall_gpa = $_POST['overall_gpa'];
    $credit_card_expiry_date = $_POST['credit_card_expiry_date'];
    $web_site_url = $_POST['web_site_url'];


    $isUsernameValid = preg_match("/[A-Za-z]{2,}/", $name);
    $isEmailValid = preg_match('/^\w+@\w+\.\w+$/', $email);
    $isUserNameValid = preg_match("/[A-Za-z]{5,}/", $password);
    $isDateOfBirthValid = preg_match('/^(([0-2][0-9])|(3[0-1])\.[0-1][0-2].\d{4})*$/', $date_of_birth);
    $isGenderValid = preg_match('/(^Male|Female)*$/i', $gender);
    $isMaritalStatusValid = preg_match('/^(Single|Married|Divorced|Widowed)*$/i', $marital_status);
    $isPasswordValid = preg_match('/\A(?=\w{6,10}\z)(?=[^a-z]*[a-z])(?=(?:[^A-Z]*[A-Z]){3})(?=\D*\d)/', $password);
    $isConfirmPasswordValid = false;
    if ($confirm_password == $password)
        $isConfirmPasswordValid = true;

    $isAddressValid = preg_match('/^\w+$/', $address);

    $isPostalCodeValid = preg_match('/\d{6}/', $postal_code);
    $isHomePhoneValid = preg_match('/\d{9}/', $home_phone);
    $isMobilePhoneValid = preg_match('/\d{9}/', $mobile_phone);
    $isCreditCardNumberValid = preg_match('/\d{16}/', $credit_card_number);
    $isCreditCardExpiryDateValid = preg_match('/^(([0-2][0-9])|(3[0-1])\.[0-1][0-2].\d{4})*$/', $credit_card_expiry_date);
    $isMonthlySalaryValid = preg_match('/UZS \d*,\d*\.\d{2}/', $monthly_salary);
    $isOverallGpaValid = preg_match('/^([0-3]\.\d{1,2})|(4\.[0-4]\d)|(4.5)$/i', $overall_gpa);
    $isWebsiteUrlValid = preg_match('/^http:\/\/\w+\.\w+$/', $web_site_url);

    $isValid = $isNameValid && $isEmailValid && $isUsernameValid && $isPasswordValid && $isConfirmPasswordValid
        && $isAddressValid && $isCityValid && $isPostalCodeValid && $isHomePhoneValid && $isMobilePhoneValid
        && $isCreditCardNumberValid && $isCreditCardExpiryDateValid && $isMonthlySalaryValid && $isWebsiteUrlValid
        && $isOverallGpaValid;

    if ($isValid) {
        header('Location: thanks.php', TRUE);
    }

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <form action="index.php" method="POST">
        <h1>Registration Form</h1>
        <p>This form validates user input and then displays "Thank You" page.</p>
        <hr />
        <h2>Please, fill below fields correctly</h2>
        <dl>
            <dt>Name</dt>
            <dd class="<?= $name->class ?>">
                <label><input type="text" name="name" value="<?= $name->value ?>"></label>
                <p>This field is required. It has to contain at least 2 chars. It should not contain any number.</p>
            </dd>
        </dl>
        <dl>
            <dt>Email</dt>
            <dd class="<?= $email->class ?>">
                <label><input type="text" name="email" value="<?= $email->value ?>"></label>
                <p>This field is required. It should correspond to email format.</p>
            </dd>
        </dl>
        <dl>
            <dt>Username</dt>
            <dd class="<?= $username->class ?>">
                <label><input type="text" name="username" value="<?= $username->value ?>"></label>
                <p>This field is required. It has to contain at least 5 chars.</p>
            </dd>
        </dl>
        <dl>
            <dt>Password</dt>
            <dd class="<?= $password->class ?>">
                <label><input type="text" name="password" value="<?= $password->value ?>"></label>
                <p>This field is required. It has to contain at least 8 chars.</p>
            </dd>
        </dl>
        <dl>
            <dt>Confirm Password</dt>
            <dd class="<?= $confirm_password->class ?>">
                <label><input type="text" name="confirm_password" value="<?= $confirm_password->value ?>"></label>
                <p>This field is required. It has to be equal to Password field.</p>
            </dd>
        </dl>
        <dl>
            <dt>Date of Birth</dt>
            <dd class="<?= $date_of_birth->class ?>">
                <label><input type="text" name="date_of_birth" value="<?= $date_of_birth->value ?>"></label>
                <p>Date should be written in dd.MM.yyyy format. For ex, 07.03.2019</p>
            </dd>
        </dl>
        <dl>
            <dt>Gender</dt>
            <dd class="<?= $gender->class ?>">
                <label><input type="text" name="gender" value="<?= $gender->value ?>"></label>
                <p>Only 2 options accepted: Male, Female.</p>
            </dd>
        </dl>
        <dl>
            <dt>Marital Status</dt>
            <dd class="<?= $marital_status->class ?>">
                <label><input type="text" name="marital_status" value="<?= $marital_status->value ?>"></label>
                <p>Only 4 options accepted: Single, Married, Divorced, Widowed</p>
            </dd>
        </dl>
        <dl>
            <dt>Address</dt>
            <dd class="<?= $address->class ?>">
                <label><input type="text" name="address" value="<?= $address->value ?>"></label>
                <p>This is required field.</p>
            </dd>
        </dl>
        <dl>
            <dt>City</dt>
            <dd class="<?= $city->class ?>">
                <label>
                    <input type="text" name="city" value="<?= $city->value ?>">
                </label>
                <p>This is required field.</p>
            </dd>
        </dl>
        <dl>
            <dt>Postal Code</dt>
            <dd class="<?= $postal_code->class ?>">
                <label>
                    <input type="text" name="postal_code" value="<?= $postal_code->value ?>">
                </label>
                <p>This is required field. It should follow 6 digit format. For ex, 100011</p>
            </dd>
        </dl>
        <dl>
            <dt>Home Phone</dt>
            <dd class="<?= $home_phone->class ?>">
                <label>
                    <input type="text" name="home_phone" value="<?= $home_phone->value ?>">
                </label>
                <p>This is required field. It should follow 9 digit format. For ex, 97 1234567</p>
            </dd>
        </dl>
        <dl>
            <dt>Mobile Phone</dt>
            <dd class="<?= $mobile_phone->class ?>">
                <label>
                    <input type="text" name="mobile_phone" value="<?= $mobile_phone->value ?>">
                </label>
                <p>This is required field. It should follow 9 digit format. For ex, 97 1234567</p>
            </dd>
        </dl>
        <dl>
            <dt>Credit Card Number</dt>
            <dd class="<?= $credit_card_number->class ?>">
                <label>
                    <input type="text" name="credit_card_number" value="<?= $credit_card_number->value ?>">
                </label>
                <p>This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234</p>
            </dd>
        </dl>
        <dl>
            <dt>Credit Card Expiry Date</dt>
            <dd class="<?= $credit_card_expiry_date->class ?>">
                <label>
                    <input type="text" name="credit_card_expiry_date" value="<?= $credit_card_expiry_date->value ?>">
                </label>
                <p>This is required field. Date should be written in dd.MM.yyyy format. For ex, 07.03.2019</p>
            </dd>
        </dl>
        <dl>
            <dt>Monthly Salary</dt>
            <dd class="<?= $monthly_salary->class ?>">
                <label>
                    <input type="text" name="monthly_salary" value="<?= $monthly_salary->value ?>">
                </label>
                <p>This is required field. It should be written in following format UZS 200,000.00</p>
            </dd>
        </dl>
        <dl>
            <dt>Web Site URL</dt>
            <dd class="<?= $web_site_url->class ?>">
                <label>
                    <input type="text" name="web_site_url" value="<?= $web_site_url->value ?>">
                </label>
                <p>This is required field. It should match URL format. For ex, http://github.com</p>
            </dd>
        </dl>
        <dl>
            <dt>Overall GPA</dt>
            <dd class="<?= $overall_gpa->class ?>">
                <label><input type="text" name="overall_gpa" value="<?= $overall_gpa->value ?>"></label>
                <p>This is required field. It should be a floating point number less than 4.</p>
            </dd>
        </dl>
        <input type="submit" value="Register">
    </form>
</body>
</html>