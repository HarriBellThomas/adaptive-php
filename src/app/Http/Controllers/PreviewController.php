<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;

class PreviewController extends Controller {
    public function show($context, $id = null) {
        switch ($context) {
            case 'embedded':
                return view('preview.embedded');
                break;

            case 'full':
                return view('preview.full');
                break;

            default:
                # Invalid, redirect to home
                return redirect()->route('home');
                break;
        }
    }
}
