USE emensawerbeseite;


CREATE TABLE IF NOT EXISTS benutzer (
                                      id INT(8) PRIMARY KEY AUTO_INCREMENT,
                                      name VARCHAR(100) NOT NULL,
                                      email VARCHAR(100) NOT NULL UNIQUE,
                                      passwort VARCHAR(200) NOT NULL,
                                      admin BOOLEAN NOT NULL DEFAULT false,
                                      anzahlfehler INT NOT NULL DEFAULT 0,
                                      anzahlanmeldungen INT NOT NULL,
                                      letzteanmeldung DATETIME,
                                      letzterfehler DATETIME
);

INSERT INTO benutzer ( name, email, passwort, admin, anzahlanmeldungen) VALUES
  ('natmul','admin@emensa.example',sha1('emensa1234'),true,0);
INSERT INTO benutzer ( name, email, passwort, admin, anzahlanmeldungen) VALUES
  ('naatmul','user@emensa.example',sha1('emensa1234'),false,0);





