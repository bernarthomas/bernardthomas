
CREATE TABLE "action" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, culture VARCHAR(255) NOT NULL, date1_prevu DATETIME NOT NULL, activite1_prevu VARCHAR(255) NOT NULL, lieu1_prevu VARCHAR(255) NOT NULL, activite1_realise VARCHAR(255) NOT NULL, lieu1_realise VARCHAR(255) NOT NULL, date1_realise_le DATETIME NOT NULL, date2_prevu DATETIME NOT NULL, activite2_prevu VARCHAR(255) NOT NULL, lieu2_prevu VARCHAR(255) NOT NULL, activite2_realise VARCHAR(255) NOT NULL, lieu2_realise VARCHAR(255) NOT NULL, date2_realise_le DATETIME NOT NULL, premiere_recolte_le DATETIME NOT NULL);