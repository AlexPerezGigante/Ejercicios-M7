create table epic(
    "id" SERIAL PRIMARY KEY NOT NULL,
    "identifier" text,
    "caption" text,
    "date" timestamp without time zone DEFAULT now() NOT NULL,
    "image" varchar(255),
    "version" text
)