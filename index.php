<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script lang="JavaScript">
            function calcPay()
            {
                var Basic = parseInt(pay.empBasic.value);
                var DA = Basic * .1;
                var HRA = Basic * .05;
                var PF = Basic * .12;
                var PT;
                if (Basic >= 20000)
                {
                    PT = 1800;
                }
                else
                {
                    PT = 1200;
                }
                var GS = Basic + DA + HRA;
                var AD = PF + PT;
                pay.empDA.value = DA;
                pay.empHRA.value = HRA;
                pay.empPF.value = PF;
                pay.empPT.value = PT;
                pay.empGS.value = GS; 
                pay.empAD.value = AD;
                pay.empNS.value = GS - AD;   
            }
        </script>
    <title>User Dashboard</title>
</head>
<body>


        <nav>
            
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">PAY ROLL</a></span>

            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">PAY ROLL</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Staff Data</a></li>
                    <li><a href="#">Pay Slip</a></li>
                    <li><a href="#">Contact</a></li>
                   <li>
        <a href="logout.php" class="btn btn-warning">Logout</a></li>
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br>
    <form name="pay" id="pay">
            <table>
                <caption><h1>Payslip</h1></caption>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="empName"/></td>
                    <td>Employee Code</td>
                    <td><input type="text" id="empCode"/></td>
                </tr>
                <tr>
                    <td>Basic</td>
                    <td><input type="text" id="empBasic" /></td>
                </tr>
                <tr>
                    <td>Dearness Allowance</td>
                    <td><input type="text" id="empDA" disabled/></td>
                    <td>Provident Fund</td>
                    <td><input type="text" id="empPF" disabled/></td>
                </tr>
                <tr>
                    <td>House Rent Allowance</td>
                    <td><input type="text" id="empHRA" disabled/></td>
                    <td>Professional Tax</td>
                    <td><input type="text" id="empPT" disabled/></td>
                </tr>
                <tr>
                    <td>Gross Salary</td>
                    <td colspan="3"><input type="text" id="empGS" disabled/></td>
                </tr>
                <tr>
                    <td>Aggregate Deduction</td>
                    <td colspan="3"><input type="text" id="empAD" disabled/></td>
                </tr>
                <tr>
                    <td>Net Salary</td>
                    <td><input type="text" id="empNS" disabled/></td>
                </tr>
                <tr>
                    <td colspan="4"  align ="center">
                        <input type="button" id="empCompute" value="Compute Pay" onclick="calcPay();" >
                    </td>
                </tr>
            </table>
        </form>
    <script src="script.js"></script>

</body>
</html>