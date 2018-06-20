<?php

namespace AVENDA\UI;

class MainUI {
	private $owner;
	public function __construct(\AVENDA\UI $owner) {
		$this->owner = $owner;
	}
	public function sendUI(Player $p) {
		$data = [ ];
		$data ["title"] = "Let's create a NPC!";
		$data ["type"] = "form"; // UI의 타입에는 form외에도 custom_form, modal이 있는데 아마도 지금 당장은 필요없으실듯 합니다.
		$data ["content"] = "Select a button!";
		$data ["buttons"] = [ 
				[ 
						"text" => "Create NPC" 
				],
				[ 
						"text" => "NPC List" 
				],
				[ 
						"text" => "NPC Delete" 
				] 
		];
		$json = json_encode ( $data ); // $data에 담긴 배열을 json 형식으로 변환하기(뭔지 정확히는 몰라도 됨)
		$pk = new ModalFormRequestPacket (); // 패킷 객체 선언
		$pk->formData = $json; // 보낼 UI 데이터를 $json으로 설정
		$pk->formId = 1410303; // 보낼 UI의 아이디를 설정. 1~ 2,147,483,647까지의 숫자. ModalFormResponsePacket 핸들링에 필요합니다
		$p->dataPacket ( $pk ); // 플레이어에게 UI 정보가 담긴 패킷 보내기
	}
}