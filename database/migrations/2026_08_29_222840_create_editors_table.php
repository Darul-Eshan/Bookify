use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('editors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('access_level')->default('Content Editor');
            $table->string('assigned_section')->default('General Content');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('editors');
    }
};