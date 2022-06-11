<?php
/**
 * デボーションプランの取得
 * 月がnullの場合は、年間プランを返す
 * 
 * @param $month 月
 * @param $day 日
 * @return 年間、月間、または一日分のリーディングプラン
 */
function getReadingPlan($month = null, $day = null) {
    $readingPlanList = [
        // January
        [
            ['創1,2 / ルカ1', 'Gen.1,2 / Lk.1'],
            ['創3-5 / ルカ2', 'Gen.3-5 / Lk.2'],
            ['創6-8 / ルカ3', 'Gen.6-8 / Lk.3'],
            ['創9-11 / ルカ4', 'Gen.9-11 / Lk.4'],
            ['創12-14 / ルカ5', 'Gen.12-14 / Lk.5'],
            ['創15-17 / ルカ6', 'Gen.15-17 / Lk.6'],
            ['創18,19 / 詩3 / ルカ7', 'Gen.18,19 / Ps.3 / Lk.7'],
            ['創20-22 / ルカ8', 'Gen.20-22 / Lk.8'],
            ['創23,24 / ルカ9', 'Gen.23,24 / Lk.9'],
            ['創25,26 / 詩6 / ルカ10', 'Gen.25,26 / Ps.6 / Lk.10'],
            ['創27,28 / 詩4 / ルカ11', 'Gen.27,28 / Ps.4 / Lk.11'],
            ['創29,30 / ルカ12', 'Gen.29,30 / Lk.12'],
            ['創31-33 / ルカ13', 'Gen.31-33 / Lk.13'],
            ['創34-36 / ルカ14', 'Gen.34-36 / Lk.14'],
            ['創37,38 / 詩7 / ルカ15', 'Gen.37,38 / Ps.7 / Lk.15'],
            ['創39-41 / ルカ16', 'Gen.39-41 / Lk.16'],
            ['創42,43 / 詩5 / ルカ17', 'Gen.42,43 / Ps.5 / Lk.17'],
            ['創44-46 / ルカ18', 'Gen.44-46 / Lk.18'],
            ['創47,48 / 詩10 / ルカ19', 'Gen.47,48 / Ps.10 / Lk.19'],
            ['創49,50 / 詩8 / ルカ20', 'Gen.49,50 / Ps.8 / Lk.20'],
            ['出エジ1,2 / 詩88 / ルカ21', 'Ex.1,2 / Ps.88 / Lk.21'],
            ['出エジ3-5 / ルカ22', 'Ex.3-5 / Lk.22'],
            ['出エジ6-8 / ルカ23', 'Ex.6-8 / Lk.23'],
            ['出エジ9-11 / ルカ24', 'Ex.9-11 / Lk.24'],
            ['出エジ12,13 / 詩21 / 使1', 'Ex.12,13 / Ps.21 / Acts 1'],
            ['出エジ14-16 / 使2', 'Ex.14-16 / Acts 2'],
            ['出エジ17-20 / 使3', 'Ex.17-20 / Acts 3'],
            ['出エジ21,22 / 詩12 / 使4', 'Ex.21,22 / Ps.12 / Acts 4'],
            ['出エジ23,24 / 詩14 / 使5', 'Ex.23,24 / Ps.14 / Acts 5'],
            ['出エジ25-27 / 使6', 'Ex.25-27 / Acts 6'],
            ['出エジ28,29 / 使7', 'Ex.28,29 / Acts 7']
        ],
        // February
        [
            ['出エジ30-32 / 使8', 'Ex.30-32 / Acts 8'],
            ['出エジ33,34 / 詩16 / 使9', 'Ex.33,34 / Ps.16 / Acts 9'],
            ['出エジ35,36 / 使10', 'Ex.35,36 / Acts 10'],
            ['出エジ37,38 / 詩19 / 使11', 'Ex.37,38 / Ps.19 / Acts 11'],
            ['出エジ39,40 / 詩15 / 使12', 'Ex.39,40 / Ps.15 / Acts 12'],
            ['レビ1-3 / 使13', 'Lev.1-3 / Acts 13'],
            ['レビ4-6 / 使14', 'Lev.4-6 / Acts 14'],
            ['レビ7-9 / 使15', 'Lev.7-9 / Acts 15'],
            ['レビ10-12 / 使16', 'Lev.10-12 / Acts 16'],
            ['レビ13,14 / 使17', 'Lev.13,14 / Acts 17'],
            ['レビ15-17 / 使18', 'Lev.15-17 / Acts 18'],
            ['レビ18,19詩13 / 使19', 'Lev.18,19Ps.13 / Acts 19'],
            ['レビ20-22 / 使20', 'Lev.20-22 / Acts 20'],
            ['レビ23,24詩24 / 使21', 'Lev.23,24Ps.24 / Acts 21'],
            ['レビ25 / 詩25-26 / 使22', 'Lev.25 / Ps.25-26 / Acts 22'],
            ['レビ26,27 / 使23', 'Lev.26,27 / Acts 23'],
            ['民1,2 / 使24', 'Num.1,2 / Acts 24'],
            ['民3,4 / 使25', 'Num.3,4 / Acts 25'],
            ['民5,6 / 詩22 / 使26', 'Num.5,6 / Ps.22 / Acts 26'],
            ['民7 / 詩23 / 使27', 'Num.7 / Ps.23 / Acts 27'],
            ['民8,9 / 使28', 'Num.8,9 / Acts 28'],
            ['民10,11 / 詩27 / マコ1', 'Num.10,11 / Ps.27 / Mk.1'],
            ['民12,13 / 詩90 / マコ2', 'Num.12,13 / Ps.90 / Mk.2'],
            ['民14-16 / マコ3', 'Num.14-16 / Mk.3'],
            ['民17,18 / 詩29 / マコ4', 'Num.17,18 / Ps.29 / Mk.4'],
            ['民19,20 / 詩28 / マコ5', 'Num.19,20 / Ps.28 / Mk.5'],
            ['民21-23 / マコ6,7', 'Num.21-23 / Mk.6,7'],
            ['民24-27 / 1コリ13', 'Num.24-27 / 1Cor.13']
        ],
        // March
        [
            ['民28,29 / マコ8', 'Num.28,29 / Mk.8'],
            ['民30,31 / マコ9', 'Num.30,31 / Mk.9'],
            ['民32,33 / マコ10', 'Num.32,33 / Mk.10'],
            ['民34-36 / マコ11', 'Num.34-36 / Mk.11'],
            ['申1,2 / マコ12', 'Deut.1,2 / Mk.12'],
            ['申3,4 / 詩36 / マコ13', 'Deut.3,4 / Ps.36 / Mk.13'],
            ['申5,6 / 詩43 / マコ14', 'Deut.5,6 / Ps.43 / Mk.14'],
            ['申7-9 / マコ15', 'Deut.7-9 / Mk.15'],
            ['申10-12 / マコ16', 'Deut.10-12 / Mk.16'],
            ['申13-15 / ガラ1', 'Deut.13-15 / Gal.1'],
            ['申16-18 / 詩38 / ガラ2', 'Deut.16-18 / Ps.38 / Gal.2'],
            ['申19-21 / ガラ3', 'Deut.19-21 / Gal.3'],
            ['申25-27 / ガラ5', 'Deut.25-27 / Gal.5'],
            ['申22-24 / ガラ4', 'Deut.22-24 / Gal.4'],
            ['申28,29 / ガラ6', 'Deut.28,29 / Gal.6'],
            ['申30,31 / 詩40 / 1コリ1', 'Deut.30,31 / Ps.40 / 1Cor.1'],
            ['申32-34 / 1コリ2', 'Deut.32-34 / 1Cor.2'],
            ['ヨシ1,2 / 詩37 / 1コリ3', 'Josh.1,2 / Ps.37 / 1Cor.3'],
            ['ヨシ3-6 / 1コリ4', 'Josh.3-6 / 1Cor.4'],
            ['ヨシ7,8 / 詩69 / 1コリ5', 'Josh.7,8 / Ps.69 / 1Cor.5'],
            ['ヨシ9-11 / 1コリ6', 'Josh.9-11 / 1Cor.6'],
            ['ヨシ12-14 / 1コリ7', 'Josh.12-14 / 1Cor.7'],
            ['ヨシ15-17 / 1コリ8', 'Josh.15-17 / 1Cor.8'],
            ['ヨシ18-20 / 1コリ9', 'Josh.18-20 / 1Cor.9'],
            ['ヨシ21,22 / 詩47 / 1コリ10 ', 'Josh.21,22 / Ps.47 / 1Cor.10'],
            ['ヨシ23,24 / 詩44 / 1コリ11 ', 'Josh.23,24 / Ps.44 / 1Cor.11'],
            ['士1-3 / 1コリ12', 'Judg.1-3 / 1Cor.12'],
            ['士4,5 / 詩39,41 / 1コリ13', 'Judg.4,5 / Ps.39,41 / 1Cor.13'],
            ['士6,7 / 詩52 / 1コリ14', 'Judg.6,7 / Ps.52 / 1Cor.14'],
            ['士8 / 詩42 / 1コリ15', 'Judg.8 / Ps.42 / 1Cor.15'],
            ['士9,10 / 詩49 / 1コリ16', 'Judg.9,10 / Ps.49 / 1Cor.16']
        ],
        // April
        [
            ['士11,12詩50 / 2コリ1', 'Judg.11,12Ps.50 / 2Cor.1 '],
            ['士13-16 / 2コリ2', 'Judg.13-16 / 2Cor.2'],
            ['士17,18 / 詩89 / 2コリ3', 'Judg.17,18 / Ps.89 / 2Cor.3'],
            ['士19-21 / 2コリ4', 'Judg.19-21 / 2Cor.4'],
            ['ルツ1,2 / 詩53,61 / 2コリ5', 'Ruth 1,2 / Ps.53,61 / 2Cor.5'],
            ['ルツ3,4 / 詩64,65 / 2コリ6', 'Ruth 3,4 / Ps.64,65 / 2Cor.6'],
            ['1サム1,2 / 詩66 / 2コリ7', '1Sam.1,2 / Ps.66 / 2Cor.7'],
            ['1サム3-5 / 詩77 / 2コリ8', '1Sam.3-5 / Ps.77 / 2Cor.8'],
            ['1サム6,7 / 詩72 / 2コリ9', '1Sam.6,7 / Ps.72 / 2Cor.9'],
            ['1サム8-10 / 2コリ10', '1Sam.8-10 / 2Cor.10'],
            ['1サム11,12 / 1歴1 / 2コリ11', '1Sam.11,12 / 1Chr.1 / 2Cor.11'],
            ['1サム13 / 1歴2,3 / 2コリ12', '1Sam.13 / 1Chr.2,3 / 2Cor.12'],
            ['1サム14 / 1歴4 / 2コリ13', '1Sam.14 / 1Chr.4 / 2Cor.13'],
            ['1サム15,16 / 1歴5 / マタ1', '1Sam.15,16 / 1Chr.5 / Mt.1'],
            ['1サム17 / 詩9 / マタ2', '1Sam.17 / Ps.9 / Mt.2'],
            ['1サム18 / 1歴6 / 詩11 / マタ3', '1Sam.18 / 1Chr.6 / Ps.11 / Mt.3'],
            ['1サム19 / 1歴7 / 詩59 / マタ4', '1Sam.19 / 1Chr.7 / Ps.59 / Mt.4'],
            ['1サム20,21 / 詩34 / マタ5', '1Sam.20,21 / Ps.34 / Mt.5'],
            ['1サム22 / 詩17,35 / マタ6', '1Sam.22 / Ps.17,35 / Mt.6'],
            ['1サム23 / 詩31,54 / マタ7', '1Sam.23 / Ps.31,54 / Mt.7'],
            ['1サム24 / 1歴8 / 詩57,58 / マタ8', '1Sam.24 / 1Chr.8 / Ps.57,58 / Mt.8'],
            ['1サム25,26 / 詩63 / マタ9', '1Sam.25,26 / Ps.63 / Mt.9'],
            ['1サム27 / 1歴9 / 詩141 / マタ10', '1Sam.27 / 1Chr.9 / Ps.141 / Mt.10'],
            ['1サム28,29 / 詩109 / マタ11', '1Sam.28,29 / Ps.109 / Mt.11'],
            ['1サム30,31 / 1歴10 / マタ12', '1Sam.30,31 / 1Chr.10 / Mt.12'],
            ['2サム1 / 詩140 / マタ13', '2Sam.1 / Ps.140 / Mt.13'],
            ['2サム2 / 1歴11 / 詩142 / マタ14', '2Sam.2 / 1Chr.11 / Ps.142 / Mt.14'],
            ['2サム3 / 1歴12 / マタ15', '2Sam.3 / 1Chr.12 / Mt.15'],
            ['2サム4,5 / 詩139 / マタ16', '2Sam.4,5 / Ps.139 / Mt.16'],
            ['2サム6 / 1歴13 / 詩68 / マタ17', '2Sam.6 / 1Chr.13 / Ps.68 / Mt.17']
        ],
        // May
        [
            ['1歴14,15 / 詩132 / マタ18', '1Chr.14,15 / Ps.132 / Mt.18'],
            ['1歴16 / 詩106 / マタ19', '1Chr.16 / Ps.106 / Mt.19'],
            ['2サム7 / 1歴17 / 詩2 / マタ20', '2Sam.7 / 1Chr.17 / Ps.2 / Mt.20'],
            ['2サム8,9 / 1歴18,19 / マタ21', '2Sam.8,9 / 1Chr.18,19 / Mt.21'],
            ['2サム10 / 1歴19,20 / 詩20 / マタ22', '2Sam.10/ 1Chr.20/Ps.20/Mt.22'],
            ['2サム11 / 12 / 詩51 / マタ23', '2Sam.11 / 12 / Ps.51 / Mt.23'],
            ['2サム13,14 / マタ24', '2Sam.13,14 / Mt.24'],
            ['2サム15,16 / 詩32 / マタ25', '2Sam.15,16 / Ps.32 / Mt.25'],
            ['2サム17 / 詩71 / マタ26', '2Sam.17 / Ps.71 / Mt.26'],
            ['2サム18 / 詩56 / マタ27', '2Sam.18 / Ps.56 / Mt.27'],
            ['2サム19,20 / 詩55 / マタ28', '2Sam.19,20 / Ps.55 / Mt.28'],
            ['2サム21-23 / 1テサ1', '2Sam.21-23 / 1Th.1'],
            ['2サム24 / 1歴21 / 詩30 / 1テサ2', '2Sam.24 / 1Chr.21 / Ps.30 / 1Th.2'],
            ['1歴22-24 / 1テサ3', '1Chr.22-24 / 1Th.3'],
            ['1歴25-27 / 1テサ4', '1Chr.25-27 / 1Th.4'],
            ['1列1 / 1歴28 / 詩91 / 1テサ5', '1Ki.1 / 1Chr.28 / Ps.91 / 1Th.5'],
            ['1列2 / 1歴29 / 詩95 / 2テサ1', '1Ki.2 / 1Chr.29 / Ps.95 / 2Th.1'],
            ['1列3 / 2歴1 / 詩78 / 2テサ2', '1Ki.3 / 2Chr.1 / Ps.78 / 2Th.2'],
            ['1列4,5 / 2歴2 / 詩101 / 2テサ3', '1Ki.4,5 / 2Chr.2 / Ps.101 / 2Th.3'],
            ['1列6 / 2歴3 / 詩97 / ロマ1', '1Ki.6 / 2Chr.3 / Ps.97 / Rom.1'],
            ['1列7 / 2歴4 / 詩98 / ロマ2', '1Ki.7 / 2Chr.4 / Ps.98 / Rom.2'],
            ['1列8 / 2歴5 / 詩99 / ロマ3', '1Ki.8 / 2Chr.5 / Ps.99 / Rom.3'],
            ['2歴6,7 / 詩135 / ロマ4', '2Chr.6,7 / Ps.135 / Rom.4'],
            ['1列9 / 2歴8 / 詩136 / ロマ5', '1Ki.9 / 2Chr.8 / Ps.136 / Rom.5'],
            ['1列10,11 / 2歴9 / ロマ6', '1Ki.10,11 / 2Chr.9 / Rom.6'],
            ['箴1-3 / ロマ7', 'Prov.1-3 / Rom.7'],
            ['箴4-6 / ロマ8', 'Prov.4-6 / Rom.8'],
            ['箴7-9 / ロマ9', 'Prov.7-9 / Rom.9'],
            ['箴10-12 / ロマ10', 'Prov.10-12 / Rom.10'],
            ['箴13-15 / ロマ11', 'Prov.13-15 / Rom.11'],
            ['箴16-18 / ロマ12', 'Prov.16-18 / Rom.12']
        ],
        // June
        [
            ['箴19-21 / ロマ13', 'Prov.19-21 / Rom.13'],
            ['箴22-24 / ロマ14', 'Prov.22-24 / Rom.14'],
            ['箴25-27 / ロマ15', 'Prov.25-27 / Rom.15'],
            ['箴28-29 / 詩60 / ロマ16', 'Prov.28-29 / Ps.60 / Rom.16'],
            ['箴30,31 / 詩33 / エペ1', 'Prov.30,31 / Ps.33 / Eph.1'],
            ['伝1-3 / 詩45 / エペ2', 'Ecc.1-3 / Ps.45 / Eph.2'],
            ['伝4-6 / 詩18 / エペ3', 'Ecc.4-6 / Ps.18 / Eph.3'],
            ['伝7-9 / エペ4', 'Ecc.7-9 / Eph.4'],
            ['伝10-12 / 詩94 / エペ5', 'Ecc.10-12 / Ps.94 / Eph.5'],
            ['雅1-4 / エペ6', 'Song 1-4 / Eph.6'],
            ['雅5-8 / ピリ1', 'Song 5-8 / Phil.1'],
            ['1列12 / 2歴10,11 / ピリ2', '1Ki.12 / 2Chr.10,11 / Phil.2'],
            ['1列13,14 / 2歴12 / ピリ3', '1Ki.13,14 / 2Chr.12 / Phil.3'],
            ['1列15 / 2歴13,14 / ピリ4', '1Ki.15 / 2Chr.13,14 / Phil.4'],
            ['1列16 / 2歴15,16 / コロ1', '1Ki.16 / 2Chr.15,16 / Col.1'],
            ['1列17-19 / コロ2', '1Ki.17-19 / Col.2'],
            ['1列20,21 / 2歴17 / コロ3', '1Ki.20,21 / 2Chr.17 / Col.3'],
            ['1列22 / 2歴18,19 / コロ4', '1Ki.22 / 2Chr.18,19 / Col.4'],
            ['2列1-3 / 詩82 / 1テモ1', '2Ki.1-3 / Ps.82 / 1Tim.1'],
            ['2列4,5 / 詩83 / 1テモ2', '2Ki.4,5 / Ps.83 / 1Tim.2'],
            ['2列6,7 / 2歴20 / 1テモ3', '2Ki.6,7 / 2Chr.20 / 1Tim.3'],
            ['2列8,9 / 2歴21 / 1テモ4', '2Ki.8,9 / 2Chr.21 / 1Tim.4'],
            ['2列10 / 2歴22,23 / 1テモ5 ', '2Ki.10 / 2Chr.22,23 / 1Tim.5'],
            ['2列11,12 / 2歴24 / 1テモ6 ', '2Ki.11,12 / 2Chr.24 / 1Tim.6'],
            ['ヨエ1-3 / 2テモ1', 'JOel 1-3 / 2Tim.1'],
            ['ヨナ1-4 / 2テモ2', 'Jon.1-4 / 2Tim.2'],
            ['2列13,14 / 2歴25 / 2テモ3 ', '2Ki.13,14 / 2Chr.25 / 2Tim.3'],
            ['アモ1-3 / 詩80 / 2テモ4', 'Amos1-3 / Ps.80 / 2Tim.4'],
            ['アモ4-6 / 詩86 / テト1', 'Amos4-6 / Ps.86 / Tit.1'],
            ['アモ7-9 / 詩104 / テト2', 'Amos7-9 / Ps.104 / Tit.2']
        ],
        // July
        [
            ['イザ1-3 / テト3', 'Is.1-3 / Tit.3'],
            ['イザ4,5 / 詩115,116 / ユダ', 'Is.4,5 / Ps.115,116 / Jude'],
            ['イザ6,7 / 2歴26,27 / ピレ', 'Is.6,7 / 2Chr.26,27 / Philem.'],
            ['2列15,16 / ホセ1 / ヘブ1', '2Ki.15,16 / Hos.1 / Heb.1'],
            ['ホセ2-5 / ヘブ2', 'Hos.2-5 / Heb.2'],
            ['ホセ6-9 / ヘブ3', 'Hos.6-9 / Heb.3'],
            ['ホセ10-12 / 詩73 / ヘブ4', 'Hos.10-12 / Ps.73 / Heb.4'],
            ['ホセ13,14 / 詩100,102 / ヘブ5 ', 'Hos.13,14 / Ps.100,102 / Heb.5'],
            ['ミカ1-4 / ヘブ6', 'Mic.1-4 / Heb.6'],
            ['ミカ5-7 / ヘブ7', 'Mic.5-7 / Heb.7'],
            ['イザ8-10 / ヘブ8', 'Is.8-10 / Heb.8'],
            ['イザ11-14 / ヘブ9', 'Is.11-14 / Heb.9'],
            ['イザ15-18 / ヘブ10', 'Is.15-18 / Heb.10'],
            ['イザ19-21 / ヘブ11', 'Is.19-21 / Heb.11'],
            ['イザ22-24 / ヘブ12', 'Is.22-24 / Heb.12'],
            ['イザ25-28 / ヘブ13', 'Is.25-28 / Heb.13'],
            ['イザ29-31 / ヤコ1', 'Is.29-31 / Jas.1'],
            ['イザ32-35 / ヤコ2', 'Is.32-35 / Jas.2'],
            ['2列17 / 2歴28 / 詩46 / ヤコ3', '2Ki.17 / 2Chr.28 / Ps.46 / Jas.3 '],
            ['2歴29-31 / ヤコ4', '2Chr.29-31 / Jas.4'],
            ['2列18,19 / 2歴32 / ヤコ5', '2Ki.18,19 / 2Chr.32 / Jas.5'],
            ['イザ36,37 / 詩76 / 1ペテ1', 'Is.36,37 / Ps.76 / 1Pet.1'],
            ['2列20/イザ38,39/詩75/1ペテ2', '2Ki.20/Is.38,39/Ps.75/1Pet.2'],
            ['イザ40-42 / 1ペテ3', 'Is.40-42 / 1Pet.3'],
            ['イザ43-45 / 1ペテ4', 'Is.43-45 / 1Pet.4'],
            ['イザ46-49 / 1ペテ5', 'Is.46-49 / 1Pet.5'],
            ['イザ50-52 / 詩92 / 2ペテ1', 'Is.50-52 / Ps.92 / 2Pet.1'],
            ['イザ53-56 / 2ペテ2', 'Is.53-56 / 2Pet.2'],
            ['イザ57-59 / 詩103 / 2ペテ3', 'Is.57-59 / Ps.103 / 2Pet.3'],
            ['イザ60-62 / ヨハ1', 'Is.60-62 / Jn.1'],
            ['イザ63-64 / 詩107 / ヨハ2', 'Is.63-64 / Ps.107 / Jn.2']
        ],
        // August
        [
            ['イザ65,66 / 詩62 / ヨハ3', 'Is.65,66 / Ps.62 / Jn.3'],
            ['2列21 / 2歴33 / ヨハ4', '2Ki.21 / 2Chr.33 / Jn.4'],
            ['ナホ1-3 / ヨハ5', 'Nah.1-3 / Jn.5'],
            ['2列22 / 2歴34 / ヨハ6', '2Ki.22 / 2Chr.34 / Jn.6'],
            ['2列23 / 2歴35 / ヨハ7', '2Ki.23 / 2Chr.35 / Jn.7'],
            ['ハバ1-3 / ヨハ8', 'Hab.1-3 / Jn.8'],
            ['ゼパ1-3 / ヨハ9', 'Zeph.1-3 / Jn.9'],
            ['エレ1,2 / ヨハ10', 'Jer.1,2 / Jn.10'],
            ['エレ3,4 / ヨハ11', 'Jer.3,4 / Jn.11'],
            ['エレ5,6 / ヨハ12', 'Jer.5,6 / Jn.12'],
            ['エレ7-9 / ヨハ13', 'Jer.7-9 / Jn.13'],
            ['エレ10-12 / ヨハ14', 'Jer.10-12 / Jn.14'],
            ['エレ13-15 / ヨハ15', 'Jer.13-15 / Jn.15'],
            ['エレ16,17 / 詩96 / ヨハ16', 'Jer.16,17 / Ps.96 / Jn.16'],
            ['エレ18-20 / 詩93 / ヨハ17', 'Jer.18-20 / Ps.93 / Jn.17'],
            ['2列24 / エレ22 / 詩112 / ヨハ18 ', '2Ki.24 / Jer.22 / Ps.112 / Jn.18 '],
            ['エレ23,25 / ヨハ19', 'Jer.23,25 / Jn.19'],
            ['エレ26,35,36ヨハ20', 'Jer.26,35,36Jn.20'],
            ['エレ45-47 / 詩105 / ヨハ21', 'Jer.45-47 / Ps.105 / Jn.21'],
            ['エレ48,49 / 詩67 / 1ヨハ1', 'Jer.48,49 / Ps.67 / 1Jn.1'],
            ['エレ21,24,27 / 詩118 / 1ヨハ2', 'Jer.21,24,27 / Ps.118 / 1Jn.2'],
            ['エレ28-30 / 1ヨハ3', 'Jer.28-30 / 1Jn.3'],
            ['エレ31,32 / 1ヨハ4', 'Jer.31,32 / 1Jn.4'],
            ['エレ33,34 / 1ヨハ5', 'Jer.33,34 / 1Jn.5'],
            ['エレ37-39 / 2ヨハ', 'Jer.37-39 / 2Jn.'],
            ['エレ50,51 / 3ヨハ', 'Jer.50,51 / 3Jn.'],
            ['エレ52 / 詩143,144 / 黙1', 'Jer.52 / Ps.143,144 / Rev.1'],
            ['エゼ1-3 / 黙2', 'Ezek.1-3 / Rev.2'],
            ['エゼ4-7 / 黙3', 'Ezek.4-7 / Rev.3'],
            ['エゼ8-11 / 黙4', 'Ezek.8-11 / Rev.4'],
            ['エゼ12-14 / 黙5', 'Ezek.12-14 / Rev.5']
        ],
        // September
        [
            ['エゼ15,16 / 詩70 / 黙6', 'Ezek.15,16 / Ps.70 / Rev.6'],
            ['エゼ17-19 / 黙7', 'Ezek.17-19 / Rev.7'],
            ['エゼ20,21 / 詩111 / 黙8', 'Ezek.20,21 / Ps.111 / Rev.8'],
            ['エゼ22-24 / 黙9', 'Ezek.22-24 / Rev.9'],
            ['エゼ25-28 / 黙10', 'Ezek.25-28 / Rev.10'],
            ['エゼ29-32 / 黙11', 'Ezek.29-32 / Rev.11'],
            ['2列25/2歴36/エレ40,41/黙12 ', '2Ki.25/2Chr.36/Jer.40,41/Rev.12 '],
            ['エレ42-44 / 詩48 / 黙13', 'Jer.42-44 / Ps.48 / Rev.13'],
            ['哀1,2 / オバ / 黙14', 'Lam.1,2 / Obad. / Rev.14'],
            ['哀3-5 / 黙15', 'Lam.3-5 / Rev.15'],
            ['ダニ1,2 / 黙16', 'Dan.1,2 / Rev.16'],
            ['ダニ3,4 / 詩81 / 黙17', 'Dan.3,4 / Ps.81 / Rev.17'],
            ['エゼ33-35 / 黙18', 'Ezek.33-35 / Rev.18'],
            ['エゼ36,37 / 詩110 / 黙19', 'Ezek.36,37 / Ps.110 / Rev.19'],
            ['エゼ38,39 / 詩145 / 黙20', 'Ezek.38,39 / Ps.145 / Rev.20'],
            ['エゼ40,41 / 詩128 / 黙21', 'Ezek.40,41 / Ps.128 / Rev.21'],
            ['エゼ42-44 / 黙22', 'Ezek.42-44 / Rev.22'],
            ['エゼ45,46 / ルカ1', 'Ezek.45,46 / Lk.1'],
            ['エゼ47,48 / ルカ2', 'Ezek.47,48 / Lk.2'],
            ['ダニ5,6 / 詩130 / ルカ3', 'Dan.5,6 / Ps.130 / Lk.3'],
            ['ダニ7,8 / 詩137 / ルカ4', 'Dan.7,8 / Ps.137 / Lk.4'],
            ['ダニ9,10 / 詩123 / ルカ5', 'Dan.9,10 / Ps.123 / Lk.5'],
            ['ダニ11,12 / ルカ6', 'Dan.11,12 / Lk.6'],
            ['エズ1 / 詩84,85 / ルカ7', 'Ezra 1 / Ps.84,85 / Lk.7'],
            ['エズ2,3 / ルカ8', 'Ezra 2,3 / Lk.8'],
            ['エズ4 / 詩113,127 / ルカ9', 'Ezra 4 / Ps.113,127 / Lk.9'],
            ['ハガ1,2 / 詩129 / ルカ10', 'Hag.1,2 / Ps.129 / Lk.10'],
            ['ゼカ1-3 / ルカ11', 'Zech.1-3 / Lk.11'],
            ['ゼカ4-6 / ルカ12', 'Zech.4-6 / Lk.12'],
            ['ゼカ7-9 / ルカ13', 'Zech.7-9 / Lk.13']
        ],
        // October
        [
            ['ゼカ10-12 / 詩126 / ルカ14 ', 'Zech.10-12 / Ps.126 / Lk.14'],
            ['ゼカ13-14 / 詩147 / ルカ15 ', 'Zech.13-14 / Ps.147 / Lk.15'],
            ['エズ5,6 / 詩138 / ルカ16', 'Ezra 5,6 / Ps.138 / Lk.16'],
            ['エス1,2 / 詩150 / ルカ17', 'Est.1,2 / Ps.150 / Lk.17'],
            ['エス3-7 / ルカ18', 'Est.3-7 / Lk.18'],
            ['エス8-10 / ルカ19', 'Est.8-10 / Lk.19'],
            ['エズ7,8 / ルカ20', 'Ezra 7,8 / Lk.20'],
            ['エズ9,10 / 詩131 / ルカ21', 'Ezra 9,10 / Ps.131 / Lk.21'],
            ['ネヘ1,2 / 詩133 / ルカ22', 'Neh.1,2 / Ps.133 / Lk.22'],
            ['ネヘ3,4 / ルカ23', 'Neh.3,4 / Lk.23'],
            ['ネヘ5,6 / 詩146 / ルカ24', 'Neh.5,6 / Ps.146 / Lk.24'],
            ['ネヘ7,8 / 使1', 'Neh.7,8 / Acts 1'],
            ['ネヘ9,10 / 使2', 'Neh.9,10 / Acts 2'],
            ['ネヘ11,12 / 詩1 / 使3', 'Neh.11,12 / Ps.1 / Acts 3'],
            ['ネヘ13 / マラ1,2 / 使4', 'Neh.13 / Mal.1,2 / Acts 4'],
            ['マラ3,4 / 詩148 / 使5', 'Mal.3,4 / Ps.148 / Acts 5'],
            ['ヨブ1,2 / 使6,7', 'Job 1,2 / Acts 6,7'],
            ['ヨブ3,4 / 使8,9', 'Job 3,4 / Acts 8,9'],
            ['ヨブ5 / 詩108 / 使10,11', 'Job 5 / Ps.108 / Acts 10,11'],
            ['ヨブ6-8 / 使12', 'Job 6-8 / Acts 12'],
            ['ヨブ9,10 / 使13,14', 'Job 9,10 / Acts 13,14'],
            ['ヨブ11,12 / 使15,16', 'Job 11,12 / Acts 15,16'],
            ['ヨブ13,14 / 使17,18', 'Job 13,14 / Acts 17,18'],
            ['ヨブ15 / 使19,20', 'Job 15 / Acts 19,20'],
            ['ヨブ16 / 使21-23', 'Job 16 / Acts 21-23'],
            ['ヨブ17 / 使24-26', 'Job 17 / Acts 24-26'],
            ['ヨブ18 / 詩114 / 使27,28', 'Job 18 / Ps.114 / Acts 27,28 '],
            ['ヨブ19 / マコ1,2', 'Job 19 / Mk.1,2'],
            ['ヨブ20 / マコ3,4', 'Job 20 / Mk.3,4'],
            ['ヨブ21 / マコ5,6', 'Job 21 / Mk.5,6'],
            ['ヨブ22 / マコ7,8', 'Job 22 / Mk.7,8']
        ],
        // November
        [
            ['詩121 / マコ9,10', 'Ps.121 / Mk.9,10'],
            ['ヨブ23,24 / マコ11,12', 'Job 23,24 / Mk.11,12'],
            ['ヨブ25 / マコ13,14', 'Job 25 / Mk.13,14'],
            ['ヨブ26,27 / マコ15,16', 'Job 26,27 / Mk.15,16'],
            ['ヨブ28,29 / ガラ1,2', 'Job 28,29 / Gal.1,2'],
            ['ヨブ30 / 詩120 / ガラ3,4', 'Job 30 / Ps.120 / Gal.3,4 '],
            ['ヨブ31,32 / ガラ5,6', 'Job 31,32 / Gal.5,6'],
            ['ヨブ33 / 1コリ1-3', 'Job 33 / 1Cor.1-3'],
            ['ヨブ34 / 1コリ4-6', 'Job 34 / 1Cor.4-6'],
            ['ヨブ35,36 / 1コリ7,8', 'Job 35,36 / 1Cor.7,8'],
            ['詩122 / 1コリ9-11', 'Ps.122 / 1Cor.9-11'],
            ['ヨブ37,38 / 1コリ12', 'Job 37,38 / 1Cor.12'],
            ['ヨブ39,40 / 1コリ13,14', 'Job 39,40 / 1Cor.13,14'],
            ['詩149 / 1コリ15,16', 'Ps.149 / 1Cor.15,16'],
            ['ヨブ41,42 / 2コリ1,2', 'Job 41,42 / 2Cor.1,2'],
            ['2コリ3-6', '2Cor.3-6'],
            ['2コリ7-10', '2Cor.7-10'],
            ['詩124 / 2コリ11-13', 'Ps.124 / 2Cor.11-13'],
            ['マタ1-4', 'Mt.1-4'],
            ['マタ5-7', 'Mt.5-7'],
            ['マタ8-10', 'Mt.8-10'],
            ['マタ11-13', 'Mt.11-13'],
            ['マタ14-16', 'Mt.14-16'],
            ['マタ17-19', 'Mt.17-19'],
            ['マタ20-22', 'Mt.20-22'],
            ['マタ23-25', 'Mt.23-25'],
            ['詩125 / マタ26､27', 'Ps.125 / Mt.26､27'],
            ['マタ28 /1テサ1-3', 'Mt.28 /1Th.1-3'],
            ['1テサ4,5 / 2テサ1-3', '1Th.4,5 / 2Th.1-3'],
            ['ロマ1-4', 'Rom.1-4']
        ],
        // December
        [
            ['ロマ5-8', 'Rom.5-8'],
            ['ロマ9-12', 'Rom.9-12'],
            ['ロマ13-16', 'Rom.13-16'],
            ['エペ1-4', 'Eph.1-4'],
            ['詩119:1-80 / エペ5,6', 'Ps.119:1-80 / Eph.5,6'],
            ['ピリ1-4', 'Phil.1-4'],
            ['コロ1-4', 'Col.1-4'],
            ['1テモ1-4', '1Tim.1-4'],
            ['1テモ5,6 / テト1-3', '1Tim.5,6 / Tit.1-3'],
            ['2テモ1-4', '2Tim.1-4'],
            ['ピレ / ヘブ1-4', 'Philem. / Heb.1-4'],
            ['ヘブ5-8', 'Heb.5-8'],
            ['ヘブ9-11', 'Heb.9-11'],
            ['ヘブ12,13 / ユダ', 'Heb.12,13 / Jude'],
            ['ヤコ1-5', 'Jas.1-5'],
            ['1ペテ1-5', '1Pet.1-5'],
            ['2ペテ1-3 / ヨハ1', '2Pet.1-3 / Jn.1'],
            ['ヨハ2-4', 'Jn.2-4'],
            ['ヨハ5,6', 'Jn.5,6'],
            ['ヨハ7,8', 'Jn.7,8'],
            ['ヨハ9-11', 'Jn.9-11'],
            ['ヨハ12-14', 'Jn.12-14'],
            ['ヨハ15-18', 'Jn.15-18'],
            ['ヨハ19-21', 'Jn.19-21'],
            ['1ヨハ1-5', '1Jn.1-5'],
            ['詩117/119:81-176/2ヨハ/3ヨハ', 'Ps.117/119:81-176/2Jn./3Jn.'],
            ['黙1-4', 'Rev.1-4'],
            ['黙5-9', 'Rev.5-9'],
            ['黙10-14', 'Rev.10-14'],
            ['黙15-18', 'Rev.15-18'],
            ['黙19-22', 'Rev.19-22']
        ]
    ];

    // 年間プランを返す
    if (is_null($month) || empty($month)) {
        return $readingPlanList;
    }

    // 月間プランを返す
    if ($day == null || empty($day)) {
        return $readingPlanList[$month - 1];
    }

    // 一日分のプランを返す
    return $readingPlanList[$month - 1][$day - 1];
}
