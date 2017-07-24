<?php
/**
 *  ______  __         ______               __    __
 * |   __ \|__|.-----.|   __ \.----..-----.|  |_ |  |--..-----..----.
 * |   __ <|  ||  _  ||   __ <|   _||  _  ||   _||     ||  -__||   _|
 * |______/|__||___  ||______/|__|  |_____||____||__|__||_____||__|
 *             |_____|
 *
 * BigBrother plugin for PocketMine-MP
 * Copyright (C) 2014-2015 shoghicp <https://github.com/shoghicp/BigBrother>
 * Copyright (C) 2016- BigBrotherTeam
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author BigBrotherTeam
 * @link   https://github.com/BigBrotherTeam/BigBrother
 *
 */

namespace shoghicp\BigBrother\network\protocol\Play;

use shoghicp\BigBrother\network\Packet;

class SpawnObjectPacket extends Packet{

	public $eid;
	public $uuid;
	public $type;
	public $x;
	public $y;
	public $z;
	public $yaw;
	public $pitch;
	public $data = 0;
	public $velocityX;
	public $velocityY;
	public $velocityZ;

	public function pid(){
		return 0x00;
	}

	public function encode(){
		$this->putVarInt($this->eid);
		$this->put($this->uuid);
		$this->putByte($this->type);
		$this->putDouble($this->x);
		$this->putDouble($this->y);
		$this->putDouble($this->z);
		$this->putByte((int)round($this->yaw * 256 / 360));//TODO make sure
		$this->putByte((int)round($this->pitch * 256 / 360));//TODO make sure
		$this->putInt($this->data);
		if($this->data > 0){
			$this->putShort((int)round($this->velocityX * 8000));
			$this->putShort((int)round($this->velocityY * 8000));
			$this->putShort((int)round($this->velocityZ * 8000));
		}
	}

	public function decode(){

	}
}
