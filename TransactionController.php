namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->session()->get('user_id'));
        $transactions = Transaction::where('user_id', $user->id)->get();
        return view('transactions.index', compact('transactions', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        Transaction::create([
            'user_id' => $request->session()->get('user_id'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('transactions.index');
    }
}
