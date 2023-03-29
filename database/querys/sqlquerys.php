<?php 

function createTableTemporary($parametro) {
    return " create TEMPORARY table TABSMS_1
    SELECT
                awnfr.custno                        AS codigo,
                LPAD(C2.ddd, 2, 0)               	AS ddd,
                C2.l1                         	AS celular,
                SUBSTRING_INDEX(custp.name, ' ', 1) AS name, 
                awnfr.cargano                       AS carga,
                awnfr.dataEntrega,
                awnfr.ordno                         AS pedido,
                (
                SELECT
                        CASE
                            WHEN remarks like '%m%' THEN 'M'
                            WHEN remarks like '%n%' THEN 'M'
                            WHEN remarks like '%t%' THEN 'T'
                        ELSE ''
                            END AS remarks
                    FROM
                                sqldados.awnfrh
                    where
                            awnfrh.storenoNfr = awnfr.storenoNfr
                        AND awnfrh.xanoNfr = awnfr.xanoNfr  
                        AND awnfrh.pdvnoNfr = awnfr.pdvnoNfr
                        AND status = 6
                    ORDER BY
                        awnfrh.date DESC,
                        time DESC
                    limit 1   
                    ) as turno
                FROM
                    sqldados.awnfr
                    INNER JOIN sqldados.custp 
                        ON awnfr.custno = no
                    LEFT JOIN sqldados.eord as P2
                        ON P2.storeno = awnfr.storenoNFr and P2.ordno = awnfr.ordno
                    LEFT JOIN sqldados.ctadd as C2
                        ON  P2.custno = C2.custno 
                        and P2.custno_addno  = C2.seqno
                
                WHERE   
                statusCarga IN(0)
                $parametro 
                AND C2.l1   <> 0 
                AND C2.ddd     <> 0 ";
}

function getDadosTable($turno) {

return "
SELECT
                55              AS 'telefone-ddi',
                TRIM(ddd)             AS 'telefone-ddd',
                TRIM(celular)         AS 'telefone-numero',
                TRIM(name)            AS 'nome',
                TRIM(GROUP_CONCAT(pedido SEPARATOR '-'))    AS pedido,
                TRIM(CASE
                    WHEN GROUP_CONCAT(turno) = 'M'   THEN 'Manha'
                    WHEN GROUP_CONCAT(turno) = 'M,M' THEN 'Manha'
                    WHEN GROUP_CONCAT(turno) = 'M,T' THEN 'Manha-Tarde'
                    WHEN GROUP_CONCAT(turno) = 'T,M' THEN 'Tarde-Manha'
                    WHEN GROUP_CONCAT(turno) = 'T'   THEN 'Tarde'
                    WHEN GROUP_CONCAT(turno) = 'T,T' THEN 'Tarde'
                END)                     AS turno,
                
                TRIM(DATE_FORMAT(dataEntrega, '%d/%m/%Y'))     AS 'data'
            FROM TABSMS_1
            WHERE
            CASE $turno
                    WHEN 1 THEN turno = 'M'
                    WHEN 2 THEN turno = 'T'
                ELSE turno IN('M','T')
            END
            GROUP BY codigo";


}


?>