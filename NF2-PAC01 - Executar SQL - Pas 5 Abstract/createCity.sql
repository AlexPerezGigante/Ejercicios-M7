CREATE TABLE city (
    "id" SERIAL PRIMARY KEY NOT NULL,
    "city" character varying(50) NOT NULL,
    "country_id" smallint NOT NULL,
    "last_update" timestamp without time zone DEFAULT now() NOT NULL
);