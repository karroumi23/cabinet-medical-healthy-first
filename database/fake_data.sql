


-- Creates the database tables

-- password (1234)
INSERT INTO users (id, username, password, role, date_creation) VALUES
(1, 'admin', '$2y$10$WAUYlKdO0UONKKuFZCgtXeURDEKt.yaP7q/PETEnkXPWQ80Fs0.BC', 'admin', '2025-06-18'),
(2, 'user',  '$2y$10$WAUYlKdO0UONKKuFZCgtXeURDEKt.yaP7q/PETEnkXPWQ80Fs0.BC', 'user',  '2025-06-18');




INSERT INTO patients (id, nom, prenom, age, genre, numero_securite_sociale, tel, adresse, date_ajout, cree_par) VALUES
(16, 'khorkhi', 'said', 29, 'F', '52345', '+212616548858', 'maroc', '2025-05-20', 'mariem'),
(20, 'haidar', 'aziz', 33, 'H', '06000', '222222', 'maroc', '2025-05-22', 'anass'),
(22, 'hassan', 'karroumi', 51, 'H', '55555', '55555', 'maroc', '2025-05-23', 'anass'),
(23, 'sebbarri', 'saif', 33, 'H', '88888', '55555', 'maroc', '2025-05-23', 'mariem'),
(24, 'lalloli', 'wafaa', 10, 'H', '5555', '55555', 'maroc', '2025-05-23', 'mariem'),
(25, 'tachfin', 'yasmine', 10, 'F', '5555', '5556', 'maroc', '2025-05-23', 'anass');



INSERT INTO dossier_medical (id, patient_id, nom_complet, groupe_sanguin, type_maladie, diagnostic, date_admission, date_fin_traitement, cout_traitement, acompte_cout, cree_par) VALUES
(5, 22, 'hassan karroumi', 'A+', 'fracture', 'test', '2025-05-08', '2025-05-23', 5000.00, 2000.00, 'anass'),
(8, 16, 'said said', 'B+', 'vertiges', 'test', '2025-05-01', '2025-05-10', 1000.00, 500.00, 'mariem'),
(10, 23, 'sebbarri saif', 'A+', 'vertiges', 'test saif', '2025-05-08', '2025-05-16', 9000.00, 4000.00, 'mariem'),
(12, 25, 'yassmine yasmine', 'B+', 'test', 'tets', '2025-05-16', '2025-05-26', 10000.00, 5000.00, 'mariem');
