--
-- Model: Note
--

CREATE TABLE IF NOT EXISTS `notes` (
    _id         INTEGER PRIMARY KEY AUTO_INCREMENT,
    title       VARCHAR(255),
    slug        VARCHAR(255) UNIQUE,
    text        TEXT,
    dateAdded   DATETIME
);
