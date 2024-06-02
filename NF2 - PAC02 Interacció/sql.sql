CREATE TABLE "chat_message" (
  "chat_message_id" serial PRIMARY KEY,
  "to_user_id" int NOT NULL,
  "from_user_id" int NOT NULL,
  "chat_message" text NOT NULL,
  "timestamp" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "status" int NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table "login"
--

CREATE TABLE "login" (
  "user_id" serial PRIMARY KEY,
  "username" varchar(255) NOT NULL,
  "password" varchar(255) NOT NULL
);

--
-- Dumping data for table "login"
--

INSERT INTO "login" ("user_id", "username", "password") VALUES
(1, 'johnsmith', 'password'),
(2, 'peterParker', 'password'),
(3, 'davidMoore', 'password');

-- --------------------------------------------------------

--
-- Table structure for table "login_details"
--

CREATE TABLE login_details (
  login_details_id serial PRIMARY KEY,
  user_id int NOT NULL,
  last_activity timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  is_type varchar(3) NOT NULL CHECK (is_type IN ('no', 'yes'))
);