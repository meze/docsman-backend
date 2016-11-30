CREATE TABLE public.project (
             id SERIAL,
           name TEXT NOT NULL,
     CONSTRAINT pk_project
    PRIMARY KEY (id)
);

CREATE TABLE public.document (
               id SERIAL,
             name TEXT        NULL,
          content TEXT        NULL,
       project_id INT         NOT NULL,
    creation_date TIMESTAMPTZ NOT NULL,
         is_trash BOOLEAN     NOT NULL DEFAULT false,
       CONSTRAINT pk_document
      PRIMARY KEY (id),

       CONSTRAINT pk_document_project
      FOREIGN KEY (project_id)
       REFERENCES public.project (id)
        ON DELETE CASCADE
);

CREATE INDEX id_document_project_id
          ON public.document (project_id);
