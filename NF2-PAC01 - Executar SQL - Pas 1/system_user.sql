CREATE TABLE "system_user" (
 "id" SERIAL PRIMARY KEY NOT NULL,
 "first_name" character varying(64),
 "last_name" character varying(128),
 "username" character varying(32),
 "md5_pw" character varying(32),
 "email_address" character varying(128),
 "date_last_login" date,
 "time_last_login" time,
 "date_account_created" date,
 "time_account_created" time
);