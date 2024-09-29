CREATE TABLE karyawan (
  id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
  nik VARCHAR(10) UNIQUE,
  nama VARCHAR(100),
  ttl DATE,
  alamat TEXT,
  id_jabatan INT,
  id_department INT
);

CREATE TABLE jabatan (
  id_jabatan INT AUTO_INCREMENT PRIMARY KEY,
  nama_jabatan VARCHAR(100),
  id_level INT
);

CREATE TABLE level (
  id_level INT AUTO_INCREMENT PRIMARY KEY,
  nama_level VARCHAR(100)
);

CREATE TABLE department (
  id_department INT AUTO_INCREMENT PRIMARY KEY,
  nama_dept VARCHAR(100)
);


INSERT INTO karyawan (nik, nama, ttl, alamat, id_jabatan, id_department)
VALUES
  ('K001', 'Whisnu', '1990-01-01', 'Jl. Utama 123', 1, 3),
  ('K002', 'Aries', '1991-05-15', 'Jl. Pelangi 456', 2, 1),
  ('K003', 'Dewantara', '1980-09-20', 'Jl. Sejahtera 789', 3, 2)

INSERT INTO jabatan (nama_jabatan, id_level)
VALUES
  ('Manager', 1),
  ('Supervisor', 2),
  ('Staff', 3);

INSERT INTO level (nama_level)
VALUES
  ('Senior'),
  ('Middle'),
  ('Junior');

INSERT INTO department (nama_dept)
VALUES
  ('Sales'),
  ('Marketing'),
  ('IT');

SELECT
    a.nama AS nama_karyawan,
    b.nama_jabatan,
    c.nama_level,
    d.nama_dept
FROM
    karyawan a
INNER JOIN jabatan b ON a.id_jabatan = b.id_jabatan
INNER JOIN level c ON b.id_level = c.id_level
INNER JOIN department d ON a.id_department = d.id_department;

UPDATE karyawan
SET
    nama = 'Superman',
    alamat = 'Jl abc 890'
WHERE
    id_karyawan = 3;

DELETE FROM karyawan
WHERE id_karyawan = 2;
