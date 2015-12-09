<?php

namespace propel2;

use propel2\Base\Post as BasePost;
use \Propel\Runtime\ActiveQuery\Criteria;

/**
 * Skeleton subclass for representing a row from the 'post' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Post extends BasePost
{

    public function getMostRecentComment()
    {
        return CommentQuery::create()
            ->filterByPost($this)
            ->orderByCreatedAt(Criteria::DESC)
            ->findOne();
    }

}
