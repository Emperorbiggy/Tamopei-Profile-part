<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../index.php");
        die();
    }

    include '../config.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $fetch = mysqli_fetch_assoc($query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/addmoney.css">
    <link rel="stylesheet" href="./style/sendmoney.css">
    <title>Tamopie Home</title>
</head>

<body>
    <div class="container">
        <aside class="">
            <div class="top">
                <div class="logo">

                    <h2><a href="">
                            <img src="./img/colorLogo.png" alt="">
                        </a></h2>
                </div>
            </div>

            <div class="sidebar">
                <a href="" class="active">
                    <span class="b material-icons-sharp">
                        grid_view
                    </span>
                    <h3 class="b">Dashboard</h3>
                </a>
                <a href="p2p/addfunds/"><span class="b material-icons-sharp">
                        account_balance
                    </span>
                    <h3 class="b">Banks</h3>
                    </span>
                </a>
                <a href="./p2p/Order-Page/order p"><span class="b material-icons-sharp">
                        add
                    </span>
                    <h3 class="b">Orders</h3>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        notifications_none
                    </span>
                    <h3 class="b">Notifications</h3>
                    <div class="circle">
                        <h3 class="white">23</h3>
                    </div>
                    </span>
                </a>
                <a href=""><span class="b material-icons-sharp">
                        history
                    </span>
                    <h3 class="b">History</h3>
                    </span>
                </a>
                <a href="./settings"><span class="b material-icons-sharp">
                        tune
                    </span>
                    <h3 class="b">Settings</h3>
                    </span>
                </a>
                <a href="../logout.php"><span class="b material-icons-sharp">
                        power_settings_new
                    </span>
                    <h3 class="b">Log out</h3>
                    </span>
                </a>
            </div>
        </aside>
        <!-- MAIN -->
        <main>
            <div class="firstheading">
                
                <h2 class="h2 hr">Hey! <?php echo $fetch['name']; ?> !</h2>
                <div class="profile">
                    <img src="./img/COB-BOB-IRT-enroll_tractor.jpg" alt="">
                </div>
            </div>
            <div class="heading">
                <div class="insights">
                    <div class="stat">
                        <div class="balance">
                            <div class="left">
                                <h3>Total<span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span id="cur-logo"></span><span id="total"> </span></h2>
                                <div class=""></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- <div class="dsahboard" id="dashboard">


                </div> -->

                <div class=" off-back off">
                    <a href="">
                        <span class="expand material-icons-sharp">
                            expand_more
                        </span>
                        <!-- <h3>more</h3> -->
                    </a>

                </div>
            </div>



            <!-- HEADING TWO                                  -->
            <div class="heading minus none" id="currency-overflow">
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Yuen<span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>¥</span> 35,000</h2>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="insights">

                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Leon <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>؋</span> 15,000
                                </h2>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Pounds <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>£</span> 1,467</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Burun <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>฿</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Deran<span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>₫</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Cedi Balance <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>N</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Cedi Balance <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>N</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Cedi Balance <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>N</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Cedi Balance <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>N</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="insights">
                    <div class="stat">
                        <!-- <span class="circle material-icons-sharp">
                            account_balance_wallet
                        </span> -->
                        <div class="balance">
                            <div class="left">
                                <h3>Cedi Balance <span class="material-icons-sharp">
                                        visibility
                                    </span></h3>
                                <h2><span>N</span> 3,000</h2>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="dashboard">
                <div>
                    <a href="" class=" insights-off green" id="add-btn">
                        <div>
                            <div class=" dash stat">
                                Add
                            </div>
                            <span class="material-icons-sharp">
                                add
                            </span>

                        </div>
                    </a>

                </div>

                <div>
                    <a href="" class="insights-off orange" id="send-btn">
                        <div>

                            <div class="dash stat">
                                Send
                            </div>
                            <span class="material-icons-sharp">
                                send
                            </span>
                        </div>
                    </a>
                </div>

                <a href="./p2p/trade/" class="insights-off blue">
                    <div>
                        <div class="dash stat">
                            p2p
                        </div>
                    </div>
                </a>
            </div>

            <div class=" available ">
                <h3 class="available-h2">Available Currencies</h3>
                <div class="available-heading">
                    <table>
                        <!-- headings -->
                        <tr>
                            <th>Country</th>
                            <th>Currency</th>
                            <th>To 1 Usd</th>
                        </tr>
                        <tr>
                            <td>Germany</td>
                            <td>£</td>
                            <td>0.8</td>
                        </tr>
                        <tr>
                            <td>Tonga</td>
                            <td>₸</td>
                            <td>52</td>
                        </tr>
                        <tr>
                            <td>Seychel</td>
                            <td>SeY : ₴</td>
                            <td>0.55</td>
                        </tr>
                        <tr>
                            <td>Cameroon</td>
                            <td>Cefa : ⨎</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Laughing Bacchus Winecellars</td>
                            <td>Yoshi Tannamuri</td>
                            <td>Canada</td>
                        </tr>
                        <tr>
                            <td>Magazzini Alimentari Riuniti</td>
                            <td>Giovanni Rovelli</td>
                            <td>Italy</td>
                        </tr>
                    </table>
                    <div class="more">
                        <a href="">
                            <span class="circle material-icons-sharp">
                                expand_more
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </main>


        <!-- Modals -->
        <div class="add-money-modal none" id="add-money-modal">
            <div class="blank"></div>

            <div class="add-container">
                <div class="add-container-top">
                    <!-- <div class="back-link">
                        <a href="">Add</a>
                    </div> -->
                    <div class="close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                    Add to wallet
                </div>
                <div class="add-container-body">
                    <div class="add-container-body-top">
                        <div class="fund-wallet">
                            <h2>Fund <span></span> Wallet</h2>
                            <p>To fund wallet provide the datails below</p>
                        </div>
                        <div class="select">
                            Select Wallet
                            <select name="" id="select">
                                <option value="select-wallet">Select Wallet</option>
                                <option value="Naira">Naira Wallet</option>
                                <option value="Cedi">Cedi wallet</option>
                                <option value="Dollar">Dollar Wallet</option>
                                <option value="Yuen">Yuen wallet</option>
                            </select>
                        </div>
                    </div>
                    <div class="banks none">
                        <!-- select button to choose wether the transaction will be done by bank transfer or card deposit -->
                        <!-- if transaction will be done by bank then show bank information entry modal-->

                        <p>Fund <span>Naira</span> wallet via Bank transfer</p>
                        <div class="wallet-balance">
                            <div class="cards amount">
                                <!-- Bank details and etc -->
                                <!-- if wallet selected is nigeria, it should only display the account number -->
                                <!-- if wallet selected is not nigeria it should display card options -->
                                <h3>Bank Name :<span>UBA Bank</span></h3>
                                <div class="account-number">
                                    Account Number: 234-5642-8796
                                </div>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <!-- Bank account informations -->
                            <div class="cards amount">
                                <!-- Bank details and etc -->
                                <!-- if wallet selected is nigeria, it should only display the account number -->
                                <!-- if wallet selected is not nigeria it should display card options -->
                                <h3>Bank Name :<span>Access Bank</span></h3>
                                <div class="account-number">
                                    Account Number: 234-5642-8796
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="buttons" id="buttons">
                        <button type="submit" class="form-btn bank-transfer">Bank Transfer</button>
                        <button type="submit" class="form-btn">p2p</button>
                    </div>



                    <!-- Fund via p2p options too will be here -->
                    <div class="deposits none">
                        <div class="d-top">
                            <p>Choose a Payment gateway for <span>Cedi</span></p>
                        </div>
                        <form action="" class="forms">
                            <div class="cards amount">
                                <button type="radio"></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div id="send-money-modal">
            <div class="blank"></div>
            <div class="send-container">
                <div class="send-container-top">
                    <!-- <div class="back-link">
                        <a href="">Send</a>
                    </div> -->
                    <div class="send-close-btn">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </div>
                    Send from wallet
                </div>
                <div class="w-to-w">
                    <div class="add-container-body-top">
                        <div class="fund-wallet">
                            <h2></h2>
                            <p>To fund wallet choose available options</p>
                        </div>

                    </div>

                </div>
                <div class="buttons">
                    <button type="submit" class="send-form-btn wallet-to-wallet">Send to wallet</button>
                    <button type="submit" class="send-form-btn wallet-to-bank">Send to bank</button>
                </div>



                <div class="select " id="wallet">

                    <label for="select">
                        Select Wallet
                        <select name="" class="wallet-select" id="send-select">
                            <option value="">Select Wallet</option>
                            <option value="Naira">Naira Wallet</option>
                            <option value="Dollar">Cedi wallet</option>
                            <option value="Pounds">Dollar Wallet</option>
                            <option value="Euro">Euro Wallet</option>
                            <option value="Yuen">Yuen wallet</option>
                        </select>

                    </label>
                    <div class="add-container-body-top">
                        <div class="fund-wallet">
                            <h2></h2>
                            <p>Total <span> </span> wallet available balance </p>
                            <!-- check if the wallet balance is grater than the entered amount
                            if yes, then continue to the transaction if no, then return a message of insufficient balance -->
                        </div>
                    </div>
                    <!-- Wallet to wallet -->
                    <form action="" id="p2p-form">

                        <div class="send-inputs">
                            <label for="beneficiary-name">
                                Username
                                <input type="text" class="bottom-border">
                            </label>

                            <label for="user-amount">
                                Enter Amount
                                <input type="text" name="user-amount" class=" bottom-border" maxlength="6">
                            </label>
                        </div>
                        <div class="confirm-details">
                            <p>Confirm Receiver information </p>
                            <div class="details">

                            </div>

                        </div>
                        <!-- if confirm button is clicked, check if the entered username is inside the database
                         then open a modal to enter password for the user to confirm the transaction. -->
                        <button type="submit" class="form-btn">Confirm</button>
                    </form>
                </div>

                <div class="deposits" id="bank-deposit">
                    <div class="add-container-body-top">
                        <div class="fund-wallet">
                            <h2></h2>
                            <p>To send money from wallet to bank account</p>
                            <!-- open a wallet select options,
                            show a bank transfer modal box where bank can be selected, account number entered,
                            amount entered, narration entered, confirmation screen then the procced btn click, 
                            account password to confirm transaction -->
                            <label for="select">
                                Select Wallet
                                <div class="sel-cont">
                                    <select class="to-bank" id="send-to-bank">
                                        <option value="select-wallet">Select Wallet</option>
                                        <option value="Naira">Naira Wallet</option>
                                        <option value="Dollar">Dollar wallet</option>
                                        <option value="Pounds">Pounds Wallet</option>
                                        <option value="Euro">Euro Wallet</option>
                                        <option value="Yuen">Yuen wallet</option>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- <div class="d-top">
                        <p>Amount to deposit</p>
                    </div> -->

                    <!-- Paymeny gateway lists -->
                    <!-- Bank details and etc -->
                    <!-- if wallet selected is nigeria, it should only display the account number -->
                    <!-- if wallet selected is not nigeria it should display card options -->


                    <div id="forms-to-bank">

                        <form id="naira-form">
                            <div class="to-b">
                                <label for="e">Bank Name
                                    <div class="inpt">
                                        <input type="text" id="bank-name" class=" bottom-border" name="bank-name" placeholder="Select Bank">
                                    </div>
                                </label>
                                <label for="e">Account Number
                                    <div class="inpt">
                                        <input type="text" id="acc-num" class=" bottom-border" name="acc-num" placeholder="Account Number">
                                    </div>
                                </label>
                                <label for="e">Amount
                                    <div class="inpt">
                                        <input type="text" id="sentVal" class=" bottom-border" name="sentVal" placeholder="minimum 100">
                                    </div>
                                </label>

                                <label for="e">Narration
                                    <div class="inpt">
                                        <input type="text" id="trans-narr" name="trans-narr" 
                                            placeholder="e.g for school fee">
                                    </div>
                                </label>
                            </div>
                            <!-- the id for the button is going to be for the naira account -->
                            <button type="submit" class=" form-btn send-form-btn wallet-to-bank"
                                id="naira-confirm-send">Confirm</button>
                        </form>
                    </div>



                    <div class="dollar-container" id="dollar-modal">
                       
                        <form action="" id="dollar-form">

                            <div class="to-b">
                                <label for="e">Bank Name
                                    <div class="inpt">
                                        <input type="text" id="bank-name" placeholder="Select Bank">
                                    </div>
                                </label>
                                <label for="e">IBAN/Account Number
                                    <div class="inpt">
                                        <input type="text" id="acc-num" placeholder="Account Number">
                                    </div>
                                </label>
                                <label for="e">Account name
                                    <div class="inpt">
                                        <input type="text" id="acc-name" placeholder="minimum 100">
                                    </div>
                                </label>
                                <label for="e">Account type
                                    <!-- dropdown menu -->
                                    <div class="inpt">
                                        <input type="text" id="acc-name" placeholder="minimum 100">
                                    </div>
                                </label>
                                <label for="e">Receipient's email
                                    <div class="inpt">
                                        <input type="text" id="acc-name" placeholder="minimum 100">
                                    </div>
                                </label>
                                <label for="e">Receipient's address
                                    <div class="inpt">
                                        <input type="text" id="acc-name" placeholder="minimum 100">
                                    </div>
                                </label>
                                <label for="e">Receipient's Postal code
                                    <div class="inpt">
                                        <input type="text" id="acc-name" placeholder="minimum 100">
                                    </div>
                                </label>

                                <label for="e">Bank routing number/Sort code
                                    <div class="inpt">
                                        <input type="text" id="trans-narr" placeholder="e.g for school fee">
                                    </div>
                                </label>
                                <label for="e">Swift code
                                    <div class="inpt">
                                        <input type="text" id="sentVal" placeholder="minimum 100">
                                    </div>
                                </label>

                                <label for="e">Description
                                    <div class="inpt">
                                        <input type="text" id="trans-narr" placeholder="e.g for school fee">
                                    </div>
                                </label>
                            </div>
                            <button type="submit" class="send-form-btn wallet-to-bank"
                                id="confirm-send">Confirm</button>
                        </form>


                    </div>
                    <!-- <div class="cards box" id="api-box">
                        <h3>Bank Name :<span>UBA Bank</span></h3>
                        <div class="account-number">
                            Account Number: 234-5642-8796
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
    </div>
    <script src="./forms.js"></script>
    <script src="./userSettings.js"></script>
    <script src="./script.js"></script>
    <script src="./currencySettings.js"></script>
    <!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15349164;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/15349164/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->
</body>

</html>