CREATE TABLE country (
    "id" SERIAL PRIMARY KEY NOT NULL,
    "country" character varying(50) NOT NULL,
    "last_update" timestamp without time zone DEFAULT now() NOT NULL
);