use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'John Doe'],
            ['name' => 'Jane Smith'],
            ['name' => 'Bob Johnson'],
            ['name' => 'Alice Brown'],
            ['name' => 'Michael White'],
        ]);
    }
}
