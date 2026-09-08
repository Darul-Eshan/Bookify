-- Adminer 4.8.4 SQLite 3 3.53.4 dump

DROP TABLE IF EXISTS "bookings";
CREATE TABLE "bookings" ("id" integer primary key autoincrement not null, "user_id" integer not null, "event_id" integer not null, "tickets" integer not null, "amount" numeric not null, "status" varchar not null default 'Completed', "created_at" datetime, "updated_at" datetime, foreign key("user_id") references "users"("id") on delete cascade, foreign key("event_id") references "events"("id") on delete cascade);


DROP TABLE IF EXISTS "cache";
CREATE TABLE "cache" ("key" varchar not null, "value" text not null, "expiration" integer not null, primary key ("key"));

CREATE INDEX "cache_expiration_index" ON "cache" ("expiration");


DROP TABLE IF EXISTS "cache_locks";
CREATE TABLE "cache_locks" ("key" varchar not null, "owner" varchar not null, "expiration" integer not null, primary key ("key"));

CREATE INDEX "cache_locks_expiration_index" ON "cache_locks" ("expiration");


DROP TABLE IF EXISTS "editors";
CREATE TABLE "editors" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "password" varchar not null, "access_level" varchar not null default 'Content Editor', "assigned_section" varchar not null default 'General Content', "status" varchar not null default 'active', "created_at" datetime, "updated_at" datetime);

CREATE UNIQUE INDEX "editors_email_unique" ON "editors" ("email");


DROP TABLE IF EXISTS "event_schedules";
CREATE TABLE "event_schedules" ("id" integer primary key autoincrement not null, "event_name" varchar not null, "session_title" varchar not null, "date_time" datetime not null, "speaker" varchar not null, "created_at" datetime, "updated_at" datetime, "venue" varchar);


DROP TABLE IF EXISTS "events";
CREATE TABLE "events" ("id" integer primary key autoincrement not null, "title" varchar not null, "category" varchar not null, "date_time" datetime not null, "venue" varchar not null, "price" numeric not null, "capacity" integer not null, "image" varchar, "created_at" datetime, "updated_at" datetime);

INSERT INTO "events" ("id", "title", "category", "date_time", "venue", "price", "capacity", "image", "created_at", "updated_at") VALUES (1,	'Chess grand masters  BD-meet up',	'Sports',	'2026-10-23 18:00:00',	'Bangladesh China Friendship conference centre',	1000,	200,	'events/nm2zKsXZc7DnBC9alfGXp2lvurA39fJAzQF7XLbJ.jpg',	'2026-09-03 20:59:47',	'2026-09-03 20:59:47');
INSERT INTO "events" ("id", "title", "category", "date_time", "venue", "price", "capacity", "image", "created_at", "updated_at") VALUES (7,	'International Folk & Heritage Festival',	'Concert',	'2026-11-28 06:30:00',	'Shilpakala Academy, Dhaka',	500,	200,	'events/qi3y0Nnn5OxjGa5BxMgomCeUN9MORLT5qxenhKcd.jpg',	'2026-09-07 23:20:18',	'2026-09-07 23:20:18');
INSERT INTO "events" ("id", "title", "category", "date_time", "venue", "price", "capacity", "image", "created_at", "updated_at") VALUES (8,	'Bengal Classical Music Night',	'Music',	'2026-12-18 14:00:00',	'Bengal Gallery, Dhaka',	350,	100,	'events/GLQ7pd28h2g4uuDBnd6kEXdXJPIeNQdBBPC1JlEU.png',	'2026-09-07 23:24:09',	'2026-09-07 23:24:09');
INSERT INTO "events" ("id", "title", "category", "date_time", "venue", "price", "capacity", "image", "created_at", "updated_at") VALUES (9,	'Traditional Craft & Theatre Expo',	'Tech Summit',	'2026-09-08 12:30:00',	'Shahbagh, Dhaka',	200,	500,	'events/X9wuJfEQSp6wLaxukTD5ySgPz3v8jThBu3LFPwTb.jpg',	'2026-09-07 23:28:43',	'2026-09-07 23:28:43');

DROP TABLE IF EXISTS "failed_jobs";
CREATE TABLE "failed_jobs" ("id" integer primary key autoincrement not null, "uuid" varchar not null, "connection" varchar not null, "queue" varchar not null, "payload" text not null, "exception" text not null, "failed_at" datetime not null default CURRENT_TIMESTAMP);

CREATE UNIQUE INDEX "failed_jobs_uuid_unique" ON "failed_jobs" ("uuid");

CREATE INDEX "failed_jobs_connection_queue_failed_at_index" ON "failed_jobs" ("connection", "queue", "failed_at");


DROP TABLE IF EXISTS "job_batches";
CREATE TABLE "job_batches" ("id" varchar not null, "name" varchar not null, "total_jobs" integer not null, "pending_jobs" integer not null, "failed_jobs" integer not null, "failed_job_ids" text not null, "options" text, "cancelled_at" integer, "created_at" integer not null, "finished_at" integer, primary key ("id"));


DROP TABLE IF EXISTS "jobs";
CREATE TABLE "jobs" ("id" integer primary key autoincrement not null, "queue" varchar not null, "payload" text not null, "attempts" integer not null, "reserved_at" integer, "available_at" integer not null, "created_at" integer not null);

CREATE INDEX "jobs_queue_index" ON "jobs" ("queue");


DROP TABLE IF EXISTS "migrations";
CREATE TABLE "migrations" ("id" integer primary key autoincrement not null, "migration" varchar not null, "batch" integer not null);

INSERT INTO "migrations" ("id", "migration", "batch") VALUES (1,	'0001_01_01_000000_create_users_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (2,	'0001_01_01_000001_create_cache_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (3,	'0001_01_01_000002_create_jobs_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (4,	'2026_08_29_163612_create_events_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (5,	'2026_08_29_163957_create_bookings_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (6,	'2026_08_29_191654_create_event_schedules_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (7,	'2026_08_29_194113_add_venue_to_event_schedules_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (8,	'2026_08_29_205202_create_settings_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (9,	'2026_08_29_215015_create_transactions_table',	1);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (10,	'2026_08_29_222840_create_editors_table',	2);
INSERT INTO "migrations" ("id", "migration", "batch") VALUES (11,	'2026_08_29_233446_create_moderators_table',	2);

DROP TABLE IF EXISTS "moderators";
CREATE TABLE "moderators" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "password" varchar not null, "access_level" varchar not null default 'Community Moderator', "assigned_section" varchar not null default 'User Reports', "status" varchar not null default 'active', "created_at" datetime, "updated_at" datetime);

CREATE UNIQUE INDEX "moderators_email_unique" ON "moderators" ("email");


DROP TABLE IF EXISTS "password_reset_tokens";
CREATE TABLE "password_reset_tokens" ("email" varchar not null, "token" varchar not null, "created_at" datetime, primary key ("email"));


DROP TABLE IF EXISTS "sessions";
CREATE TABLE "sessions" ("id" varchar not null, "user_id" integer, "ip_address" varchar, "user_agent" text, "payload" text not null, "last_activity" integer not null, primary key ("id"));

CREATE INDEX "sessions_last_activity_index" ON "sessions" ("last_activity");

CREATE INDEX "sessions_user_id_index" ON "sessions" ("user_id");

INSERT INTO "sessions" ("id", "user_id", "ip_address", "user_agent", "payload", "last_activity") VALUES ('rNMpbEXuAKhTmy52sDavclN6CRen1Rb3MedHwEhT',	1,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',	'eyJfdG9rZW4iOiJ0ZGxYRERyYnJ1MDZPdFRhWTRyNElLSmJXWjdmalJXQzNJWTNNclFxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Jvb2tpZnkudGVzdCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6eyJpbnRlbmRlZCI6Imh0dHA6XC9cL2Jvb2tpZnkudGVzdFwvYWRtaW5cL2Rhc2hib2FyZCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',	1788824130);
INSERT INTO "sessions" ("id", "user_id", "ip_address", "user_agent", "payload", "last_activity") VALUES ('L8OjbUXO2c2jk9sRz6gKEimoo2e6zdxAIOXZnlVL',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36',	'eyJfdG9rZW4iOiJMcGtVYTdVaXBER3NGVkZ3NHd6a3M1ZTM5NW5ySTdRWnNqNDhxVmZQIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Jvb2tpZnkudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',	1788824771);

DROP TABLE IF EXISTS "settings";
CREATE TABLE "settings" ("id" integer primary key autoincrement not null, "key" varchar not null, "value" text, "created_at" datetime, "updated_at" datetime);

CREATE UNIQUE INDEX "settings_key_unique" ON "settings" ("key");




DROP TABLE IF EXISTS "transactions";
CREATE TABLE "transactions" ("id" integer primary key autoincrement not null, "transaction_id" varchar not null, "user_name" varchar not null, "email" varchar, "event_name" varchar not null, "amount" numeric not null, "method" varchar not null, "phone" varchar, "status" varchar not null default 'success', "created_at" datetime, "updated_at" datetime);

CREATE UNIQUE INDEX "transactions_transaction_id_unique" ON "transactions" ("transaction_id");


DROP TABLE IF EXISTS "users";
CREATE TABLE "users" ("id" integer primary key autoincrement not null, "name" varchar not null, "email" varchar not null, "email_verified_at" datetime, "password" varchar not null, "role" varchar not null default 'user', "profile_picture" varchar, "phone_number" varchar not null, "address" varchar, "birth_date" integer, "remember_token" varchar, "created_at" datetime, "updated_at" datetime);

CREATE UNIQUE INDEX "users_email_unique" ON "users" ("email");

INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "role", "profile_picture", "phone_number", "address", "birth_date", "remember_token", "created_at", "updated_at") VALUES (1,	'Bahktiar Hamim Arman',	'2024100010068@seu.edu.bd',	NULL,	'$2y$12$UlZrGCBUXpj18ftlxji47elgqaDjFkuB293Sz4MGFucKF8xDuxrIW',	'admin',	NULL,	'01908152430',	NULL,	NULL,	NULL,	'2026-09-03 20:46:42',	'2026-09-03 20:46:42');
INSERT INTO "users" ("id", "name", "email", "email_verified_at", "password", "role", "profile_picture", "phone_number", "address", "birth_date", "remember_token", "created_at", "updated_at") VALUES (2,	'Bahktiar Hamim Arman',	'bahktiar192@gmail.com',	NULL,	'$2y$12$ZgHq/3JJJQGQLftNt2MJYurlcN51uw7PR3d/pvMZLlVffwM.p/k/W',	'user',	NULL,	'01908152430',	NULL,	NULL,	NULL,	'2026-09-06 14:39:02',	'2026-09-06 14:39:02');

-- 
