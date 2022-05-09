<?php declare( strict_types=1 );

namespace Tribe\Libs\Field_Models\Collections;

use Spatie\DataTransferObject\DataTransferObjectCollection;
use Tribe\Libs\Field_Models\Models\User;

class User_Collection extends DataTransferObjectCollection {

	public static function create( array $users ): User_Collection {
		return new static( User::arrayOf( $users ) );
	}

}
