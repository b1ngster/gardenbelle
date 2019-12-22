use Framework\Base as Base;
    use Framework\ArrayMethods as ArrayMethods;
    use Framework\Database\Exception as Exception;

    class Query extends Base
    {
        public function from($from, $fields = array("*"))
        {
            if (empty($from))
            {
                throw new Exception\Argument("Invalid argument");
            }

            $this->_from = $from;

            if ($fields)
            {
                $this->_fields[$from] = $fields;
            }

            return $this;
        }

        public function join($join, $on, $fields = array())
        {
            if (empty($join))
            {
                throw new Exception\Argument("Invalid argument");
            }

            if (empty($on))
            {
                throw new Exception\Argument("Invalid argument");
            }

            $this->_fields += array($join => $fields);
            $this->_join[] = "JOIN {$join} ON {$on}";

            return $this;
        }

        public function limit($limit, $page = 1)
        {
            if (empty($limit))
            {
                throw new Exception\Argument("Invalid argument");
            }

            $this->_limit = $limit;
            $this->_offset = $limit * ($page - 1);

            return $this;
        }

        public function order($order, $direction = "asc")
        {
            if (empty($order))
            {
                throw new Exception\Argument("Invalid argument");
            }

            $this->_order = $order;
            $this->_direction = $direction;

            return $this;
        }

        public function where()
        {
            $arguments = func_get_args();

            if (sizeof($arguments) < 1)
            {
                throw new Exception\Argument("Invalid argument");
            }

            $arguments[0] = preg_replace("#\?#", "%s", $arguments[0]);

            foreach (array_slice($arguments, 1, null, true) as $i => $parameter)
            {
                $arguments[$i] = $this->_quote($arguments[$i]);
            }

            $this->_where[] = call_user_func_array("sprintf", $arguments);

            return $this;
        }
    }
}
