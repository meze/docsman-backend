CREATE TABLE public.application (
             id SERIAL,
           name TEXT   NOT NULL,
     CONSTRAINT pk_application
    PRIMARY KEY (id)
);

CREATE TABLE public.tracking (
                id SERIAL,
            field1 INT         NOT NULL CHECK (field1 >= 0),
            field2 INT         NOT NULL CHECK (field2 >= 0),
            field3 INT         NOT NULL CHECK (field3 >= 0),
    application_id INT         NOT NULL,
        created_at TIMESTAMPTZ NOT NULL,
        CONSTRAINT pk_tracking
       PRIMARY KEY (id),

        CONSTRAINT pk_tracking_application
       FOREIGN KEY (application_id)
        REFERENCES public.application (id)
         ON DELETE CASCADE
);

CREATE INDEX tracking_application_id
          ON public.tracking (application_id);

CREATE TABLE public.history (
                id SERIAL,
    application_id INT    NOT NULL,
           payload TEXT   NOT NULL,

        CONSTRAINT pk_history
       PRIMARY KEY (id),
        CONSTRAINT pk_history_application
       FOREIGN KEY (application_id)
        REFERENCES public.application (id)
         ON DELETE CASCADE
);
