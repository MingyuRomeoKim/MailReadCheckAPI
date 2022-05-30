<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\SingleMailResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\Routing\Annotation\Route;

class MailReadController extends Controller
{

    /**
     * @example http://127.0.0.1:8001/api/mail/readReceipt/eyJpdiI6InlSa0hhcnYrd1hDcnRCQ3RKTElxV1E9PSIsInZhbHVlIjoiUkNSMnB3Smwvb0tqUFdzbnBxMDdKdz09IiwibWFjIjoiNWU1MDhhOTg2MjM4OWMxZmExMDJlM2I4YjE5NThkMTJlMTdkYWZmMjc4Y2EzZWJiMzhjNDlkYmY1ZmEzNDA3MyIsInRhZyI6IiJ9.jpg
     *
     *
     * @author mingyu@mt.co.kr
     * @since 2022.05.18
     *
     * @note Crypt Key : base64:your_app_key
     * @param string $partnerType : MT 등
     * @param string $information : laravel Crypt::encrype($userEamil)
     * @param int $listIdx
     *
     */
    #[Route('/api/mail/readReceipt/{listIdx}/{partnerType}/{userEmail}')]
    public function index(int $listIdx, string $partnerType, string $userEmail)
    {
        // userEmail 데이터 가공
        $userEmailArr = explode('.',$userEmail);
        $decryptUserEmail = Crypt::decrypt($userEmailArr[0]);

        // DB 읽음표시
        $singleMailResultModel = new SingleMailResult;
        $singleMailResultModel->bind('apiDB',$partnerType.'_SINGLE_MAIL_RESULT');

        $updateResponse = $singleMailResultModel
            ->where('LIST_IDX',$listIdx)
            ->where('EMAIL',$decryptUserEmail)
            ->update([
                'IS_READ' => 1
            ]);

        if(!$updateResponse) { // 읽음 확인이 제대로 안 된 경우 후처리.

        }

        // i pixel image 만들어 리턴하기
        return response(storage_path('app/public/api/1pixel.gif'))->header('Content-Type','image/gif');
    }
}
