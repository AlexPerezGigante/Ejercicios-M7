create TABLE loguserapp(
    "idUserApp" int,
    "codi" int,
    "comentari" varchar(255) NOT NULL,
    "regTime" timestamp without time zone DEFAULT now() NOT NULL,
    "isActive" boolean
);