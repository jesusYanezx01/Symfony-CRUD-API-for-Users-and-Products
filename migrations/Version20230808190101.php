<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230808190101 extends AbstractMigration
{ //Holaaaa esto ya estaba antes
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY fk_compra_usuario');
        $this->addSql('ALTER TABLE compra DROP FOREIGN KEY fk_compra_producto');
        $this->addSql('DROP TABLE compra');
        $this->addSql('DROP TABLE producto');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compra (id_compra INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, producto_id INT NOT NULL, direccion_envio VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, total_pedido DOUBLE PRECISION NOT NULL, INDEX fk_compra_producto (producto_id), INDEX fk_compra_usuario (usuario_id), PRIMARY KEY(id_compra)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE producto (id_producto INT AUTO_INCREMENT NOT NULL, nombre_producto VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cantidades_disponibles INT NOT NULL, precio_unitario DOUBLE PRECISION NOT NULL, PRIMARY KEY(id_producto)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT fk_compra_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario)');
        $this->addSql('ALTER TABLE compra ADD CONSTRAINT fk_compra_producto FOREIGN KEY (producto_id) REFERENCES producto (id_producto)');
    }
}
