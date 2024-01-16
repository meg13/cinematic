USE ProgettoWeb;

-- Populate Users table
INSERT INTO Users (username, email, `password`, bio) VALUES
('user1', 'user1@example.com', 'password1', 'Bio for user1'),
('user2', 'user2@example.com', 'password2', 'Bio for user2'),
('user3', 'user3@example.com', 'password3', 'Bio for user3'),
('user4', 'user4@example.com', 'password4', 'Bio for user4'),
('user5', 'user5@example.com', 'password5', 'Bio for user5');

-- Populate Movies table
INSERT INTO Movies (movie_id, title) VALUES
('tt0482571', 'The Prestige'),
('tt15398776', 'Oppenheimer'),
('tt4633694', 'Spider-Man: Into the Spider-Verse'),
('tt0240772', 'Ocean''s Eleven'),
('tt0198781', 'Monsters, Inc.');

-- Populate Followership table
INSERT INTO Followership (following_user_id, followed_user_id) VALUES
('user1', 'user2'),
('user1', 'user3'),
('user2', 'user3'),
('user3', 'user4'),
('user4', 'user5');

-- Populate Posts table
INSERT INTO Posts (body, user_id, movie_id, stars, `date`) VALUES
('Great movie!', 'user1', 'tt0482571', 5, '2024-01-16 12:00:00'),
('Interesting plot.', 'user2', 'tt15398776', 4, '2024-01-16 12:30:00'),
('Could have been better.', 'user3', 'tt15398776', 3, '2024-01-16 13:00:00'),
('Awesome film!', 'user4', 'tt15398776', 5, '2024-01-16 14:00:00'),
('A must-watch.', 'user5', 'tt0240772', 4, '2024-01-16 15:00:00');

-- Populate Comments table
INSERT INTO Comments (post_id, user_id, body) VALUES
(1, 'user2', 'I agree!'),
(1, 'user3', 'I loved it too!'),
(2, 'user1', 'Tell me more!'),
(3, 'user4', 'I disagree.'),
(4, 'user5', 'Totally agree!');

-- Populate Notifications table
INSERT INTO Notifications (receiving_user_id, responsable_user_id, `type`, post_id, `date`, `read`) VALUES
('user2', 'user1', 'F', 1, '2024-01-16 12:05:00', 0),
('user3', 'user1', 'L', 1, '2024-01-16 12:10:00', 0),
('user2', 'user1', 'C', 2, '2024-01-16 12:35:00', 1),
('user4', 'user3', 'P', 3, '2024-01-16 13:15:00', 0),
('user5', 'user4', 'P', 4, '2024-01-16 14:30:00', 0);

-- Populate ToWatch table
INSERT INTO ToWatch (user_id, movie_id) VALUES
('user1', 'tt15398776'),
('user2', 'tt0240772'),
('user3', 'tt0240772'),
('user4', 'tt0240772'),
('user5', 'tt15398776');

-- Populate Watched table
INSERT INTO Watched (user_id, movie_id, `date`) VALUES
('user1', 'tt0482571', '2024-01-16 12:15:00'),
('user2', 'tt15398776', '2024-01-16 12:45:00'),
('user3', 'tt15398776', '2024-01-16 13:15:00'),
('user4', 'tt15398776', '2024-01-16 14:30:00'),
('user5', 'tt0240772', '2024-01-16 15:30:00');

-- Populate Likes table
INSERT INTO Likes (user_id, post_id) VALUES
('user1', 1),
('user2', 1),
('user3', 2),
('user4', 4),
('user5', 5);
