ALTER TABLE users
  ADD first_name VARCHAR(255) NOT NULL,
      last_name VARCHAR(255) NOT NULL,
      ...
      cc_number VARCHAR(255) NULL;


ALTER TABLE users
  DROP COLUMN name;
