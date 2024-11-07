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
                                <p class="card-number"><?= e($account->account_number) ?></p>
                                <div class="card-details">
                                    <div class="card-holder">
                                        <p>Account Holder</p>
                                        <p class="name"><?= e($user->fullName()) ?></p>
                                    </div>
                                    <div class="card-account-number">
                                        <p>Account Number</p>
                                        <p class="number"><?= e($account->account_number) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="balance">
                            <h2>₹<?= e(number_format($account->balance, 2)) ?></h2>
                            <p>Account Balance</p>

                            <div class="balance-details">
                                <div class="withdrawl">
                                    <p>Total Debit</p>
                                    <p class="debit">
                                        ₹<?= e(number_format($total_dr_amount, 2)) ?>
                                    </p>
                                </div>
                                <div class="totalcredit">
                                    <p>Total Credit</p>
                                    <p class="credit">
                                        ₹<?= e(number_format($total_cr_amount, 2)) ?>
                                    </p>
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
        <?php include VIEW_PATH . '/partials/_message.php' ?>

        <?php /*
        <?php if (\Fantom\Session::hasFlash('error')): ?>
            <p class="error-message"><?= \Fantom\Session::flash('error') ?></p>
        <?php endif; ?>
        */ ?>
        <form action="/user/home/send-money" method="post" id="sendMoneyForm">
            <!-- <label for="recipient">Recipient Account Number:</label> -->
            <input type="text" id="recipient" name="recipient" placeholder="Recipient Account Number" required>

            <!-- <label for="amount">Amount to Send:</label> -->
            <input type="number" id="amount" name="amount" placeholder="₹ Amount to Send" required>

            <button type="submit" type="submit">Send Money</button>
        </form>
    </div>

    <!-- Content for the bottom section -->
    <div class="bottom-section">

      <!-- Transaction Table -->
      
      <div class="centered-container">
  <h2>Recent Transactions</h2>
</div>


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
            <?php foreach ($transactions as $t): ?>
                <tr>
                    <td>
                        <?= date("d/m/Y h:ia", strtotime($t->transaction_date)) ?>
                    </td>
                    <td><?= $t->narration ?></td>
                    <td>
                        <?= $t->isCredit() ? '+' : '-' ?>
                        ₹<?= $t->amount ?>
                    </td>
                    <td><?= $t->isCredit() ? 'Credit' : 'Debit'  ?></td>
                </tr>
            <?php endforeach; ?>

  </tbody>
</table>
</div>
</div>