


SELECT x.NAMA_PRESPEKTIF, x.JUMLAH_KEHILANGAN, x.STOK, SUBSTRING(x.PERIODE_KEHILANGAN, 1, 11) AS prMinggu
FROM
(
SELECT pres.ID_PRESPEKTIF, pres.NAMA_PRESPEKTIF, kri.NAMA_KRITERIA, tok.NAMA_TOKO, hilang.JUMLAH_KEHILANGAN, SUBSTRING(hilang.PERIODE_KEHILANGAN, 1, 11) AS prMinggu, 
jmlst.STOK, jmlst.PERIODE_STOK
FROM PRESPEKTIF pres JOIN KRITERIA kri ON pres.ID_PRESPEKTIF = kri.ID_PRESPEKTIF
JOIN DAFTAR_TOKO tok ON kri.ID_TOKO = tok.ID_TOKO
JOIN KEHILANGAN hilang ON tok.ID_TOKO = hilang.ID_TOKO
JOIN STOK_BARANG jmlst ON tok.ID_TOKO = jmlst.ID_TOKO
WHERE pres.ID_PRESPEKTIF = 'JP003'
) x GROUP BY x.PERIODE_STOK, x.PERIODE_KEHILANGAN

SELECT pres.ID_PRESPEKTIF, pres.NAMA_PRESPEKTIF, kri.NAMA_KRITERIA, tok.NAMA_TOKO, hilang.JUMLAH_KEHILANGAN, SUBSTRING(hilang.PERIODE_KEHILANGAN, 1, 11) AS prMinggu, 
SUBSTRING(jmlst.PERIODE_STOK, 1, 11) AS prMingguAA, jmlst.STOK
FROM PRESPEKTIF pres JOIN KRITERIA kri ON pres.ID_PRESPEKTIF = kri.ID_PRESPEKTIF
JOIN DAFTAR_TOKO tok ON kri.ID_TOKO = tok.ID_TOKO
JOIN KEHILANGAN hilang ON tok.ID_TOKO = hilang.ID_TOKO
JOIN STOK_BARANG jmlst ON tok.ID_TOKO = jmlst.ID_TOKO
WHERE pres.ID_PRESPEKTIF = 'JP003'
GROUP BY prMingguAA, prMinggu

-- ===================================
-- ====== PRODUKTIFITAS KARYAWAN =====
-- ===================================

SELECT toko.ID_TOKO, pn.JUMLAH_PENDAPATAN, pn.PERIODE_PENDAPATAN
FROM DAFTAR_TOKO toko JOIN PENDAPATAN_TOKO pn ON pn.ID_TOKO = toko.ID_TOKO
GROUP BY pn.PERIODE_PENDAPATAN

SELECT toko.ID_TOKO, toko.NAMA_TOKO, COUNT(toko.ID_TOKO) AS jumlah_karaywan
FROM DAFTAR_TOKO toko JOIN KARYAWAN karya ON toko.ID_TOKO = karya.ID_TOKO
GROUP BY toko.ID_TOKO

SELECT toko.ID_TOKO, toko.NAMA_TOKO, pn.JUMLAH_PENDAPATAN, SUBSTRING(pn.PERIODE_PENDAPATAN,1, 11) AS pr, COUNT(kary.ID_KARYAWAN) AS jmlKaryawan
FROM DAFTAR_TOKO toko JOIN PENDAPATAN_TOKO pn ON toko.ID_TOKO = pn.ID_TOKO
JOIN KARYAWAN kary ON toko.ID_TOKO = kary.ID_TOKO
GROUP BY pr


select z.ta_nama, sum(z.hasil)*z.PRESENTASE/100 AS Hasil
FROM
    (select x.ta_nama, x.presentase, x.nm_jenis_prestasi, sum(x.bobot_prestasi), max(x.maksimal_nilai),
        (
        case when sum(x.bobot_prestasi) > max(x.maksimal_nilai) then max(x.maksimal_nilai)
            else sum(x.bobot_prestasi) 
        end
        ) hasil
    FROM
        (
        SELECT PM.TA_ID, PM.TA_NAMA, PRES.TA_NM_PRESTASI, KR.NM_KRITERIA_PRESENT, JP.NM_JENIS_PRESTASI, NP.FAKTOR_PRESTASI, NP.BOBOT_PRESTASI, NP.MAKSIMAL_NILAI, KR.PRESENTASE
        FROM PEMILIK_TALENT PM JOIN TA_PRESTASI PRES ON PM.TA_ID = PRES.TA_ID
            JOIN NILAI_PRESTASI NP ON NP.ID_NILAI_PRES = PRES.ID_NILAI_PRES
            JOIN JENIS_PRESTASI JP ON JP.ID_JENIS_PRESTASI = NP.ID_JENIS_PRESTASI
            JOIN KRITERIA_PRESENTASE KR ON KR.ID_KRITERIA_PRESENT = NP.ID_KRITERIA_PRESENT
        WHERE PM.TA_ID = '$idTA'
        ) x
    group by x.ta_nama, x.nm_jenis_prestasi
    ) z
group by z.ta_nama
order by Hasil DESC


SELECT a.ID_PRESPEKTIF, a.NAMA_PRESPEKTIF, b.ID_KRITERIA, b.NAMA_KRITERIA, c.NAMA_TOKO, c.ALAMAT_TOKO,
    COUNT(k.ID_KARYAWAN) AS jmlKaryawan, p.JUMLAH_PENDAPATAN, p.PERIODE_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI
FROM PRESPEKTIF a JOIN KRITERIA b ON a.ID_PRESPEKTIF = b.ID_PRESPEKTIF
    JOIN DAFTAR_TOKO c ON b.ID_TOKO = c.ID_TOKO
    JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
    JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
    JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO
    JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
WHERE a.ID_PRESPEKTIF = 'JP001' AND p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-2%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-2%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-2%'
GROUP BY c.ID_TOKO



-- ===================================
-- ===== Melakukan Penilaian Fix =====
-- ===================================
SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKar, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN
FROM
    (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN
    FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
        JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
        JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
        JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
        JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
    WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-1%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-1%' AND 
    kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%'
    GROUP BY c.ID_TOKO, k.ID_KARYAWAN
    ) x
GROUP BY x.ID_TOKO
-- ===================================
-- ===== Melakukan Penilaian Fix =====
-- ===================================



SELECT b.ID_TOKO, SUM(b.JUMLAH_PENJUALAN) AS AAA FROM
(SELECT x.ID_TOKO, x.NAMA_TOKO, x.ALAMAT_TOKO, COUNT(x.ID_TOKO) as jmlKaryawan, x.JUMLAH_PENDAPATAN, x.STOK, x.JUMLAH_KELUHAN, 
x.JUMLAH_TERLAYANI, x.JUMLAH_KEHILANGAN, x.JUMLAH_PENJUALAN
FROM
    (SELECT c.ID_TOKO, c.NAMA_TOKO, c.ALAMAT_TOKO, k.ID_KARYAWAN, p.JUMLAH_PENDAPATAN, sb.STOK, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, hl.JUMLAH_KEHILANGAN, jtok.JUMLAH_PENJUALAN, jtok.PERIODE_PENJUALAN
    FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
        JOIN PENDAPATAN_TOKO p ON c.ID_TOKO = p.ID_TOKO
        JOIN STOK_BARANG sb ON c.ID_TOKO = sb.ID_TOKO 
        JOIN KELUAHAN kl ON c.ID_TOKO = kl.ID_TOKO
        JOIN KEHILANGAN hl ON c.ID_TOKO = hl.ID_TOKO
        JOIN PENJUALAN_TOKO jtok ON c.ID_TOKO = jtok.ID_TOKO
    WHERE p.PERIODE_PENDAPATAN LIKE '%Minggu Ke-1%' AND sb.PERIODE_STOK LIKE '%Minggu Ke-1%' AND 
    kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%' AND kl.PERIODE_KELUHAN LIKE '%Minggu Ke-1%' AND jtok.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'
    GROUP BY c.ID_TOKO, k.ID_KARYAWAN
    ) x
GROUP BY x.ID_TOKO) b 
GROUP BY b.ID_TOKO



SELECT SUM(JUMLAH_PENJUALAN) AS AA, PERIODE_PENJUALAN
FROM penjualan_toko
WHERE PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'
GROUP BY ID_TOKO



-- JUMLAH KARYAWAN
SELECT c.ID_TOKO, c.NAMA_TOKO, COUNT(k.ID_KARYAWAN) AS jmlKaryawan
FROM DAFTAR_TOKO c JOIN KARYAWAN k ON c.ID_TOKO = k.ID_TOKO
GROUP BY c.ID_TOKO

-- STOK
SELECT st.ID_TOKO, SUM(st.STOK) AS jmlStok, SUBSTRING(st.PERIODE_STOK, 1, 11) AS prMinggu
FROM STOK_BARANG st
WHERE SUBSTRING(st.PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-1%'
GROUP BY st.ID_BARANG, st.ID_TOKO

-- KELUHAN
SELECT kl.ID_TOKO, SUM(kl.JUMLAH_KELUHAN) AS jmlKeluhan, SUM(kl.JUMLAH_TERLAYANI) AS jmlTerlayani, SUBSTRING(kl.PERIODE_KELUHAN, 1, 11) AS prMinggu
FROM KELUAHAN kl
WHERE SUBSTRING(kl.PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%'
GROUP BY kl.ID_TOKO

-- KEHILANGAN
SELECT hl.ID_TOKO, SUM(hl.JUMLAH_KEHILANGAN) AS jmlKehilangan, SUBSTRING(hl.PERIODE_KEHILANGAN, 1, 11) AS prMinggu
FROM KEHILANGAN hl
WHERE SUBSTRING(hl.PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-1%'
GROUP BY hl.ID_TOKO

-- PENDAPATAN
SELECT pnd.ID_TOKO, SUM(pnd.JUMLAH_PENDAPATAN), SUBSTRING(pnd.PERIODE_PENDAPATAN, 1, 11) AS prMinggu
FROM PENDAPATAN_TOKO pnd
WHERE SUBSTRING(pnd.PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-1%'
GROUP BY pnd.ID_TOKO


-- COM
SELECT kl.ID_TOKO, kl.JUMLAH_KELUHAN, kl.JUMLAH_TERLAYANI, SUBSTRING(kl.PERIODE_KELUHAN, 1, 11) AS prMinggu,
    hl.ID_TOKO, hl.JUMLAH_KEHILANGAN, SUBSTRING(hl.PERIODE_KEHILANGAN, 1, 11) AS prMinggu
FROM DAFTAR_TOKO dt JOIN KELUAHAN kl ON dt.ID_TOKO = kl.ID_TOKO
JOIN KEHILANGAN hl ON dt.ID_TOKO = hl.ID_TOKO
WHERE SUBSTRING(kl.PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%' AND SUBSTRING(hl.PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-1%'
GROUP BY kl.ID_TOKO, hl.ID_TOKO


-- ==================================
-- === Melakukan Penilaian Fix v2 ===
-- ==================================
SELECT ID_TOKO as took, NAMA_TOKO, 
    (SELECT count(*)
        FROM KARYAWAN
        WHERE ID_TOKO = took) as jmlKar,
            (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                FROM KELUAHAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qKel,
            (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                FROM KELUAHAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qLayani,
            (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                FROM KEHILANGAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-1%') as qHilang,
            (SELECT IFNULL(SUM(STOK), 0)
                FROM STOK_BARANG
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-1%') as qStok,  
            (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualan,
            (SELECT COUNT(ID_BARANG)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualan,
            (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                FROM PENDAPATAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-1%') as qPendapatan
FROM DAFTAR_TOKO
-- ==================================
-- === Melakukan Penilaian Fix v2 ===
-- ==================================
-- ==================================
-- === Melakukan Penilaian Fix v3 ===
-- ==================================
SELECT ID_TOKO as took, NAMA_TOKO, ALAMAT_TOKO,
    (SELECT count(*)
        FROM KARYAWAN
        WHERE ID_TOKO = took) as jmlKar,
            (SELECT IFNULL(SUM(JUMLAH_KELUHAN), 0)
                FROM KELUAHAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qKel,
            (SELECT IFNULL(SUM(JUMLAH_TERLAYANI), 0)
                FROM KELUAHAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KELUHAN, 1, 11) LIKE '%Minggu Ke-1%') as qLayani,
            (SELECT IFNULL(SUM(JUMLAH_KEHILANGAN), 0)
                FROM KEHILANGAN
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_KEHILANGAN, 1, 11) LIKE '%Minggu Ke-1%') as qHilang,
            (SELECT IFNULL(SUM(STOK), 0)
                FROM STOK_BARANG
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_STOK, 1, 11) LIKE '%Minggu Ke-1%') as qStok,  
            (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qPenjualanm1,
            (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-2%') as qPenjualanm2,
            (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-3%') as qPenjualanm3,
            (SELECT IFNULL(SUM(JUMLAH_PENJUALAN), 0)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-4%') as qPenjualanm4,
            (SELECT COUNT(ID_BARANG)
                FROM PENJUALAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENJUALAN, 1, 11) LIKE '%Minggu Ke-1%') as qJmlBarang,
            (SELECT IFNULL(SUM(JUMLAH_PENDAPATAN), 0)
                FROM PENDAPATAN_TOKO
                WHERE ID_TOKO = took AND SUBSTRING(PERIODE_PENDAPATAN, 1, 11) LIKE '%Minggu Ke-1%') as qPendapatan
FROM DAFTAR_TOKO
-- ==================================
-- === Melakukan Penilaian Fix v3 ===
-- ==================================


-- ==================================
-- ========== Hasil Fix v2 ==========
-- ==================================
SELECT ID_TOKO as took, NAMA_TOKO, 
            (SELECT SUM(NILAI_K4)
                FROM NILAI_PERHITUNGAN
                WHERE ID_TOKO = took GROUP BY SUBSTRING(PERIODE_PERHITUNGAN, 12, 8)) as n4,
            (SELECT SUM(NILAI_K5)
                FROM NILAI_PERHITUNGAN
                WHERE ID_TOKO = took GROUP BY SUBSTRING(PERIODE_PERHITUNGAN, 12, 8)) as n5,
            (SELECT SUM(NILAI_K6)
                FROM NILAI_PERHITUNGAN
                WHERE ID_TOKO = took GROUP BY SUBSTRING(PERIODE_PERHITUNGAN, 12, 8)) as n6
FROM DAFTAR_TOKO
-- ==================================
-- ========== Hasil Fix v2 ==========
-- ==================================



INSERT INTO STOK_BARANG
    (ID_STOK, ID_TOKO, ID_BARANG, STOK, PERIODE_STOK)
VALUES
    ('ST001', 'TK001', 'BR001', '50', 'Minggu Ke-1 2020-06'),
    ('ST002', 'TK001', 'BR001', '40', 'Minggu Ke-2 2020-06'),
    ('ST003', 'TK001', 'BR001', '30', 'Minggu Ke-3 2020-06'),
    ('ST004', 'TK001', 'BR001', '34', 'Minggu Ke-4 2020-06'),

    ('ST005', 'TK001', 'BR002', '65', 'Minggu Ke-1 2020-06'),
    ('ST006', 'TK001', 'BR002', '23', 'Minggu Ke-2 2020-06'),
    ('ST007', 'TK001', 'BR002', '54', 'Minggu Ke-3 2020-06'),
    ('ST008', 'TK001', 'BR002', '21', 'Minggu Ke-4 2020-06'),

    ('ST009', 'TK001', 'BR003', '56', 'Minggu Ke-1 2020-06'),
    ('ST010', 'TK001', 'BR003', '33', 'Minggu Ke-2 2020-06'),
    ('ST011', 'TK001', 'BR003', '20', 'Minggu Ke-3 2020-06'),
    ('ST012', 'TK001', 'BR003', '77', 'Minggu Ke-4 2020-06'),

    ('ST013', 'TK002', 'BR001', '45', 'Minggu Ke-1 2020-06'),
    ('ST014', 'TK002', 'BR001', '34', 'Minggu Ke-2 2020-06'),
    ('ST015', 'TK002', 'BR001', '23', 'Minggu Ke-3 2020-06'),
    ('ST016', 'TK002', 'BR001', '56', 'Minggu Ke-4 2020-06'),

    ('ST017', 'TK002', 'BR002', '22', 'Minggu Ke-1 2020-06'),
    ('ST018', 'TK002', 'BR002', '66', 'Minggu Ke-2 2020-06'),
    ('ST019', 'TK002', 'BR002', '11', 'Minggu Ke-3 2020-06'),
    ('ST020', 'TK002', 'BR002', '12', 'Minggu Ke-4 2020-06'),

    ('ST021', 'TK002', 'BR003', '33', 'Minggu Ke-1 2020-06'),
    ('ST022', 'TK002', 'BR003', '22', 'Minggu Ke-2 2020-06'),
    ('ST023', 'TK002', 'BR003', '42', 'Minggu Ke-3 2020-06'),
    ('ST024', 'TK002', 'BR003', '44', 'Minggu Ke-4 2020-06')


INSERT INTO KEHILANGAN
    (ID_KEHILANGAN, ID_TOKO, JUMLAH_KEHILANGAN, PERIODE_KEHILANGAN)
VALUES
    ('KH001', 'TK001', '10', 'Minggu Ke-1 2020-06'),
    ('KH002', 'TK001', '5', 'Minggu Ke-2 2020-06'),
    ('KH003', 'TK001', '8', 'Minggu Ke-3 2020-06'),
    ('KH004', 'TK001', '9', 'Minggu Ke-4 2020-06'),
    ('KH005', 'TK002', '12', 'Minggu Ke-1 2020-06'),
    ('KH006', 'TK002', '3', 'Minggu Ke-2 2020-06'),
    ('KH007', 'TK002', '6', 'Minggu Ke-3 2020-06'),
    ('KH008', 'TK002', '9', 'Minggu Ke-4 2020-06')


INSERT INTO KELUAHAN
    (ID_KELUHAN, ID_TOKO, JUMLAH_KELUHAN, JUMLAH_TERLAYANI, PERIODE_KELUHAN)
VALUES
    ('KL001', 'TK001', '40', '10', 'Minggu Ke-1 2020-06'),
    ('KL002', 'TK001', '23', '5', 'Minggu Ke-2 2020-06'),
    ('KL003', 'TK001', '44', '43', 'Minggu Ke-3 2020-06'),
    ('KL004', 'TK001', '68', '21', 'Minggu Ke-4 2020-06'),
    ('KL005', 'TK002', '52', '12', 'Minggu Ke-1 2020-06'),
    ('KL006', 'TK002', '40', '1', 'Minggu Ke-2 2020-06'),
    ('KL007', 'TK002', '98', '21', 'Minggu Ke-3 2020-06'),
    ('KL008', 'TK002', '64', '60', 'Minggu Ke-4 2020-06')


INSERT INTO PENJUALAN_TOKO
    (ID_PENJUALAN, ID_TOKO, ID_BARANG, JUMLAH_PENJUALAN, PERIODE_PENJUALAN)
VALUES
    ('PN017', 'TK001', 'BR003', '21', 'Minggu Ke-1 2020-06'),
    ('PN018', 'TK001', 'BR003', '23', 'Minggu Ke-2 2020-06'),
    ('PN019', 'TK001', 'BR003', '5', 'Minggu Ke-3 2020-06'),
    ('PN020', 'TK001', 'BR003', '8', 'Minggu Ke-4 2020-06'),
    ('PN021', 'TK002', 'BR003', '7', 'Minggu Ke-1 2020-06'),
    ('PN022', 'TK002', 'BR003', '4', 'Minggu Ke-2 2020-06'),
    ('PN023', 'TK002', 'BR003', '3', 'Minggu Ke-3 2020-06'),
    ('PN024', 'TK002', 'BR003', '2', 'Minggu Ke-4 2020-06')

    
INSERT INTO PENDAPATAN_TOKO
    (ID_PENDAPATAN, ID_TOKO, JUMLAH_PENDAPATAN, PERIODE_PENDAPATAN)
VALUES
    ('PD001', 'TK001', '1000000', 'Minggu Ke-1 2020-06'),
    ('PD002', 'TK001', '3000000', 'Minggu Ke-2 2020-06'),
    ('PD003', 'TK001', '6000000', 'Minggu Ke-3 2020-06'),
    ('PD004', 'TK001', '800000', 'Minggu Ke-4 2020-06'),
    ('PD005', 'TK002', '2000000', 'Minggu Ke-1 2020-06'),
    ('PD006', 'TK002', '400000', 'Minggu Ke-2 2020-06'),
    ('PD007', 'TK002', '3500000', 'Minggu Ke-3 2020-06'),
    ('PD008', 'TK002', '1200000', 'Minggu Ke-4 2020-06')


SELECT p.ID_PERUSAHAAN, p.NAMA_PERUSAHAAN, b.NAMA_BARANG, p.PANGSA_PASAR, p.PERIODE_PASAR
FROM PERUSAHAAN p JOIN BARANG b ON p.ID_BARANG = b.ID_BARANG



SELECT a.*, b.ID_PASAR, b.M1
FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
WHERE a.ID_TOKO = 'TK001' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'
GROUP BY a.ID_BARANG


SELECT a.*, b.ID_PASAR, b.M1, b.M2, b.M3, b.M4, count(a.JUMLAH_PENJUALAN) AS jjj
FROM penjualan_toko a JOIN PANGSA_PASAR b ON a.ID_BARANG = b.ID_BARANG
WHERE a.ID_TOKO = '$get_id_toko_penjualan' AND a.PERIODE_PENJUALAN LIKE '%Minggu Ke-4%'
GROUP BY a.ID_TOKO, a.PERIODE_PENJUALAN


SELECT aaa.ID_TOKO, aaa.ID_BARANG, aaa.JUMLAH_PENJUALAN, bbb.STOK, aaa.PERIODE_PENJUALAN
FROM PENJUALAN_TOKO aaa JOIN STOK_BARANG bbb ON aaa.ID_BARANG = bbb.ID_BARANG
WHERE aaa.ID_TOKO = 'TK001' AND aaa.PERIODE_PENJUALAN LIKE '%Minggu Ke-1%'