<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            padding: 30px;
        }

        .form-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .gender {
            display: flex;
            gap: 20px;
        }

        .gender label {
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .gender input {
            width: auto;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-btn {
            background: #2563eb;
            color: white;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .reset-btn {
            background: #e5e7eb;
            color: #333;
        }

        .reset-btn:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Student Details Form</h1>

        <form action="formresult.php" method="post">

            <div class="form-group">
                <label for="studentName">Student Name</label>
                <input type="text" id="studentName" name="studentName"
                       placeholder="Enter student name" required>
            </div>

            <div class="form-group">
                <label for="fatherName">Father/Guardian Name</label>
                <input type="text" id="fatherName" name="fatherName"
                       placeholder="Enter father/guardian name" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="gender">
                    <label>
                        <input type="radio" name="gender" value="male">
                        Male
                    </label>

                    <label>
                        <input type="radio" name="gender" value="female">
                        Female
                    </label>

                    <label>
                        <input type="radio" name="gender" value="other">
                        Other
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="class">Class/Grade</label>
                <select id="class" name="class" required>
                    <option value="">Select Class</option>
                    <option value="1">Class 1</option>
                    <option value="2">Class 2</option>
                    <option value="3">Class 3</option>
                    <option value="4">Class 4</option>
                    <option value="5">Class 5</option>
                    <option value="6">Class 6</option>
                    <option value="7">Class 7</option>
                    <option value="8">Class 8</option>
                    <option value="9">Class 9</option>
                    <option value="10">Class 10</option>
                    <option value="11">Class 11</option>
                    <option value="12">Class 12</option>
                </select>
            </div>

            <div class="form-group">
                <label for="section">Section</label>
                <input type="text" id="section" name="section"
                       placeholder="e.g. A">
            </div>

            <div class="form-group">
                <label for="rollNumber">Roll Number</label>
                <input type="text" id="rollNumber" name="rollNumber"
                       placeholder="Enter roll number">
            </div>

            <div class="form-group">
                <label for="admissionNumber">Admission Number</label>
                <input type="text" id="admissionNumber" name="admissionNumber"
                       placeholder="Enter admission number">
            </div>

            <div class="form-group">
                <label for="school">School/College Name</label>
                <input type="text" id="school" name="school"
                       placeholder="Enter school/college name">
            </div>

            <div class="form-group">
                <label for="phone">Contact Number</label>
                <input type="tel" id="phone" name="phone"
                       placeholder="Enter contact number" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email"
                       placeholder="Enter email address">
            </div>

            <div class="form-group">
                <label for="address">Home Address</label>
                <textarea id="address" name="address" rows="3"
                          placeholder="Enter complete address"></textarea>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city"
                       placeholder="Enter city">
            </div>

            <div class="form-group">
                <label for="emergencyName">Emergency Contact Name</label>
                <input type="text" id="emergencyName" name="emergencyName"
                       placeholder="Enter emergency contact name">
            </div>

            <div class="form-group">
                <label for="emergencyPhone">Emergency Contact Number</label>
                <input type="tel" id="emergencyPhone" name="emergencyPhone"
                       placeholder="Enter emergency contact number">
            </div>

            <div class="form-group">
                <label for="medical">Medical Information</label>
                <textarea id="medical" name="medical" rows="3"
                          placeholder="Enter any relevant medical information"></textarea>
            </div>

            <div class="buttons">
                <button type="submit" class="submit-btn" name="submit">Submit</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>

        </form>
    </div>

   

</body>
</html>








