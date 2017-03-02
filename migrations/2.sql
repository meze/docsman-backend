CREATE TABLE public."user" (
                 id SERIAL,
              email TEXT        NOT NULL,
    emailNormalized TEXT        NOT NULL,
           password TEXT        NOT NULL,
      creation_date TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
          is_active BOOLEAN     NOT NULL DEFAULT true,
              roles TEXT[]      NOT NULL,
         CONSTRAINT pk_user
        PRIMARY KEY (id)
);
