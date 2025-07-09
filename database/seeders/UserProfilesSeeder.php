<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProfile;


class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $perfis = [
        [
            'nome' => 'Mateus Elias Sarmento da Rosa',
            'idade' => 25,
            'rua' => 'Rua das Palmeiras',
            'bairro' => 'Centro',
            'cidade' => 'Soledade',
            'estado' => 'RS',
            'biografia' => 'Desenvolvedor Júnior Full Stack com foco em PHP, Laravel e soluções web modernas.',
        ],
        [
            'nome' => 'Carla Menezes',
            'idade' => 42,
            'rua' => 'Rua Santo Ângelo',
            'bairro' => 'Vila Nova',
            'cidade' => 'Belo Horizonte',
            'estado' => 'MG',
            'biografia' => 'Professora de História apaixonada por educação e cultura brasileira.',
        ],
        [
            'nome' => 'Rodrigo Bastos',
            'idade' => 33,
            'rua' => 'Rua das Camélias',
            'bairro' => 'Centro',
            'cidade' => 'Salvador',
            'estado' => 'BA',
            'biografia' => 'Empresário no ramo de móveis planejados.',
        ],
        [
            'nome' => 'Juliana Farias',
            'idade' => 29,
            'rua' => 'Rua Vinte de Setembro',
            'bairro' => 'São Cristóvão',
            'cidade' => 'Curitiba',
            'estado' => 'PR',
            'biografia' => 'Psicóloga clínica especializada em terapia cognitivo-comportamental.',
        ],
        [
            'nome' => 'Marcelo Vieira',
            'idade' => 38,
            'rua' => 'Rua Dom João VI',
            'bairro' => 'Menino Deus',
            'cidade' => 'Porto Alegre',
            'estado' => 'RS',
            'biografia' => 'Gerente de supermercado e amante de ciclismo.',
        ],
        [
            'nome' => 'Letícia Nunes',
            'idade' => 24,
            'rua' => 'Rua Dona Francisca',
            'bairro' => 'Planalto',
            'cidade' => 'Florianópolis',
            'estado' => 'SC',
            'biografia' => 'Nutricionista recém-formada com foco em alimentação infantil.',
        ],
        [
            'nome' => 'Renato Alves',
            'idade' => 47,
            'rua' => 'Rua Barão do Rio Branco',
            'bairro' => 'Centro',
            'cidade' => 'Campo Grande',
            'estado' => 'MS',
            'biografia' => 'Veterinário especializado em animais silvestres.',
        ],
        [
            'nome' => 'Sofia Lima',
            'idade' => 31,
            'rua' => 'Rua das Hortênsias',
            'bairro' => 'Santa Luzia',
            'cidade' => 'Recife',
            'estado' => 'PE',
            'biografia' => 'Artista plástica com obras expostas em todo o nordeste.',
        ],
        [
            'nome' => 'André Souza',
            'idade' => 54,
            'rua' => 'Rua Benjamin Constant',
            'bairro' => 'Jardim América',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'biografia' => 'Advogado atuante em direito do consumidor.',
        ],
        [
            'nome' => 'Tatiane Ribeiro',
            'idade' => 36,
            'rua' => 'Rua São Sebastião',
            'bairro' => 'Boa Vista',
            'cidade' => 'Vitória',
            'estado' => 'ES',
            'biografia' => 'Fisioterapeuta com foco em reabilitação pós-cirúrgica.',
        ],
        [
            'nome' => 'Daniel Monteiro',
            'idade' => 28,
            'rua' => 'Rua José de Alencar',
            'bairro' => 'Industrial',
            'cidade' => 'Manaus',
            'estado' => 'AM',
            'biografia' => 'Músico autodidata e professor de violão popular.',
        ],
        [
            'nome' => 'Isabela Fernandes',
            'idade' => 45,
            'rua' => 'Rua Getúlio Vargas',
            'bairro' => 'Centro',
            'cidade' => 'Aracaju',
            'estado' => 'SE',
            'biografia' => 'Chefe de cozinha com especialidade em culinária nordestina.',
        ],
    ];

    foreach ($perfis as $perfil) {
        \App\Models\UserProfile::create($perfil);
    }
}

}
