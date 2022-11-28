<?php

include 'header.php';

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="Dashboard.php"><span style="color: red;">BINISH</span>GYM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 text-danger active" aria-current="page" href="Dashboard.php">Dashboard</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Registration
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="customers.php">Customers</a></li>
                                <li><a class="dropdown-item" href="employee.php">Employee</a></li>
                                <li><a class="dropdown-item" href="members.php">Members</a></li>
                                <li><a class="dropdown-item" href="items_registration.php">Product Registration</a></li>
                                <li><a class="dropdown-item" href="items_details.php">Product Description</a></li>
                                <li><a class="dropdown-item" href="gym_plan.php">Gym Plan</a></li>
                                <li><a class="dropdown-item" href="shifts.php">Shifts</a></li>
                                <li><a class="dropdown-item" href="users.php">Users</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Payments
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="expense.php">Expense</a></li>
                                <li><a class="dropdown-item" href="Fees.php">Fees</a></li>
                                <li><a class="dropdown-item" href="sales.php">Sales</a></li>
                                <li><a class="dropdown-item" href="payroll.php">Salaries</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                View Records
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="loans.php">Loans</a></li>
                                <li><a class="dropdown-item" href="expire_membership.php">Expired Memberships</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                View Reports
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="sales_rpt.php">Sales Report</a></li>
                                <li><a class="dropdown-item" href="fee_report.php">Fee Report</a></li>
                                <li><a class="dropdown-item" href="payroll_report.php">Payroll Report</a></li>
                                <li><a class="dropdown-item" href="expense_report.php">Expense Report</a></li>
                                <li><a class="dropdown-item" href="transaction_report.php">General Report</a></li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link mx-2" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>