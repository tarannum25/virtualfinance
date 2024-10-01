<?php $this->use('templates/user.php', ['title' => 'Home | User']) ?>

<!-- <section class="section">
	<div class="cotainer">
		<div class="columns is-centered">
			<div class="column is-6">
				<div class="box">
					<h1>User Dashboard</h1>
				</div>
			</div>
		</div>
	</div>
</section> -->


<main>
        <div class="top-section">
            <section class="dashboard">
                <div class="card-section">
                    <div class="card-container">
                        <div class="virtual-debit-card">
                            <div class="card-header">
                                <img src="https://w7.pngwing.com/pngs/169/83/png-transparent-integrated-circuit-smart-card-card-chip-electronics-text-rectangle-thumbnail.png" alt="Card Chip" class="card-chip">
                                <p class="card-type">Virtual Debit Card</p>
                            </div>
                            <div class="card-body">
                                <p class="card-number">1234 5678 9012 3456</p>
                                <div class="card-details">
                                    <div class="card-holder">
                                        <p>Account Holder</p>
                                        <p class="name">Tarannum Mahtab</p>
                                    </div>
                                    <div class="card-account-number">
                                        <p>Account Number</p>
                                        <p class="number">00123456789</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="balance">
                            <h2>₹5,000.00</h2>
                            <p>Account Balance</p>

                            <div class="balance-details">
                                <div class="withdrawl">
                                    <p>Total Debit</p>
                                    <p class="debit">₹5,000.00</p>
                                </div>
                                <div class="totalcredit">
                                    <p>Total Credit</p>
                                    <p class="credit">₹8,000.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main> 
    <!-- Send Money Section (Input Box for Sending Money) -->
    <div class="send-money-section">
        <h3>Send Money</h3>
        <form id="sendMoneyForm">
            <!-- <label for="recipient">Recipient Account Number:</label> -->
            <input type="text" id="recipient" name="recipient" placeholder="Recipient Account Number" required>

            <!-- <label for="amount">Amount to Send:</label> -->
            <input type="number" id="amount" name="amount" placeholder="₹Amount to Send" required>

            <button type="submit">Send Money</button>
        </form>
    </div>

    <!-- Content for the bottom section -->
    <div class="bottom-section">

      <!-- Transaction Table -->
      <h2>Recent Transactions</h2>
      <table class="transaction-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Transanction</th>
              <th>Amount</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
        <tr>
          <td>2024-03-15</td>
          <td>Grocery Corner</td>
          <td>-₹5000</td>
          <td>Debit</td>
      </tr>
      <tr>
          <td>2024-05-14</td>
          <td>Online Subscription</td>
          <td>-₹1500</td>
          <td>Debit</td>
      </tr>
      <tr>
          <td>2024-05-23</td>
          <td>Electricity Bill</td>
          <td>-₹12000</td>
          <td>Debit</td>
      </tr>
      <tr>
          <td>2024-06-15</td>
          <td>Deposit</td>
          <td>+₹10000</td>
          <td>Credit</td>
      </tr>
      <tr>
          <td>2024-08-23</td>
          <td>Medicine Shop</td>
          <td>-₹12000</td>
          <td>Debit</td>
      </tr>
      <tr>
          <td>2024-09-15</td>
          <td>Deposit</td>
          <td>+₹10000</td>
          <td>Credit</td>
      </tr>
  </tbody>
</table>
</div>
</div>