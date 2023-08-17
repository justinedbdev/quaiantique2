CREATE TABLE
    Avis(
        avis_id int PRIMARY KEY NOT NULL auto_increment,
        note int NOT NULL,
        contenu varchar(255) NOT NULL,
        client_id int NOT NULL,
        foreign key (client_id) REFERENCES client(client_id)
    );

INSERT INTO
    Avis (note, contenu, client_id)
VALUES 
    (5, 'Le service est rapide et génial, nous avons toujours été bien accueillis!', 52),
    (4, 'Lieu très chaleureux. Convient à des groupes d\'amis. Les repas sont très bon et les formules sont abordables et permet de goûter a plusieurs spécialités savoyardes.', 123),
    (5, 'Tout était parfait!', 189),