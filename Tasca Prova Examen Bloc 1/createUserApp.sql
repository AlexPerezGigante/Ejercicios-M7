CREATE TABLE UserApp (
    "id" SERIAL PRIMARY KEY NOT NULL,
    "nom" varchar(255),
    "group" varchar(255),
    "created" timestamp without time zone DEFAULT now() NOT NULL,
    "lastUpdate" timestamp without time zone DEFAULT now() NOT NULL,
    "isActive" boolean
);