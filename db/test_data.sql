SET FOREIGN_KEY_CHECKS=0;

INSERT INTO users (first_name, last_name, gender, phone, username, password, image_url)
VALUES
    ('John', 'Doe', 1, '1234567890', 'johndoe', 'password123', 'https://example.com/johndoe.jpg'),
    ('Jane', 'Doe', 2, '9876543210', 'janedoe', 'password123', 'https://example.com/janedoe.jpg'),
    ('Bob', 'Smith', 1, '5551234567', 'bobsmith', 'password123', 'https://example.com/bobsmith.jpg'),
    ('Alice', 'Johnson', 2, '7654321098', 'alicejohnson', 'password123', 'https://example.com/alicejohnson.jpg'),
    ('Mike', 'Williams', 1, '3421876543', 'mikewilliams', 'password123', 'https://example.com/mikewilliams.jpg');

    INSERT INTO accounts (account_number, account_type, status, user_id, balance)
VALUES
    ('1234567890', 1, 1, 1, 1000.00),
    ('9876543210', 1, 1, 2, 500.00),
    ('5551234567', 2, 1, 3, 2000.00),
    ('7654321098', 1, 1, 4, 1500.00),
    ('3421876543', 2, 1, 5, 2500.00);

INSERT INTO transactions (amount, narration, transaction_date, transaction_type, user_id)
VALUES
    -- John Doe's transactions
    (100.00, 'Initial deposit', '2022-01-01 12:00:00', 1, 1),
    (50.00, 'Withdrawal', '2022-01-05 10:00:00', 2, 1),
    (200.00, 'Deposit', '2022-01-10 14:00:00', 1, 1),
    (75.00, 'Withdrawal', '2022-01-15 11:00:00', 2, 1),
    (300.00, 'Deposit', '2022-01-20 16:00:00', 1, 1),
    (25.00, 'Withdrawal', '2022-01-25 09:00:00', 2, 1),
    (400.00, 'Deposit', '2022-02-01 13:00:00', 1, 1),
    (150.00, 'Withdrawal', '2022-02-05 12:00:00', 2, 1),
    (500.00, 'Deposit', '2022-02-10 15:00:00', 1, 1),
    (100.00, 'Withdrawal', '2022-02-15 10:00:00', 2, 1),

    -- Jane Doe's transactions
    (50.00, 'Initial deposit', '2022-01-01 12:00:00', 1, 2),
    (25.00, 'Withdrawal', '2022-01-05 10:00:00', 2, 2),
    (100.00, 'Deposit', '2022-01-10 14:00:00', 1, 2),
    (50.00, 'Withdrawal', '2022-01-15 11:00:00', 2, 2),
    (200.00, 'Deposit', '2022-01-20 16:00:00', 1, 2),
    (75.00, 'Withdrawal', '2022-01-25 09:00:00', 2, 2),
    (300.00, 'Deposit', '2022-02-01 13:00:00', 1, 2),
    (150.00, 'Withdrawal', '2022-02-05 12:00:00', 2, 2),
    (400.00, 'Deposit', '2022-02-10 15:00:00', 1, 2),
    (100.00, 'Withdrawal', '2022-02-15 10:00:00', 2, 2),

    -- Bob Smith's transactions
    (200.00, 'Initial deposit', '2022-01-01 12:00:00', 1, 3),
    (100.00, 'Withdrawal', '2022-01-05 10:00:00', 2, 3),
    (500.00, 'Deposit', '2022-01-10 14:00:00', 1, 3),
    (250.00, 'Withdrawal', '2022-01-15 11:00:00', 2, 3),
    (600.00, 'Deposit', '2022-01-20 16:00:00', 1, 3),
    (150.00, 'Withdrawal', '2022-01-25 09:00:00', 2, 3),
    (700.00, 'Deposit', '2022-02-01 13:00:00', 1, 3),
    (300.00, 'Withdrawal', '2022-02-05 12:00:00', 2, 3),
    (800.00, 'Deposit', '2022-02-10 15:00:00', 1, 3),
    (200.00, 'Withdrawal', '2022-02-15 10:00:00', 2, 3),

    -- Alice Johnson's transactions
    (150.00, 'Initial deposit', '2022-01-01 12:00:00', 1, 4),
    (75.00, 'Withdrawal', '2022-01-05 10:00:00', 2, 4),
    (300.00, 'Deposit', '2022-01-10 14:00:00', 1, 4),
    (150.00, 'Withdrawal', '2022-01-15 11:00:00', 2, 4),
    (450.00, 'Deposit', '2022-01-20 16:00:00', 1, 4),
    (100.00, 'Withdrawal', '2022-01-25 09:00:00', 2, 4),
    (550.00, 'Deposit', '2022-02-01 13:00:00', 1, 4),
    (250.00, 'Deposit', '2022-02-01 14:00:00', 1, 4);


SET FOREIGN_KEY_CHECKS=1;
