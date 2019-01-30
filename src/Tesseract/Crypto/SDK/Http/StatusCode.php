<?php namespace Tesseract\Crypto\SDK\Http;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * This Class contains the const of  HTTP status code information found at ietf.org and Wikipedia.
 *
 * Class StatusCode
 * @package Tesseract\Crypto\SDK\Http
 */
class StatusCode
{
    /**
     * The request has succeeded. The information returned with the
     * response is dependent on the method used in the request, for
     * example:
     *
     * GET an entity corresponding to the requested resource is
     * sent in the response.
     * HEAD the entity-header fields corresponding to the
     * requested resource are sent in the response without any message-body.
     * POST an entity describing or containing the result of the
     * action.
     * TRACE an entity containing the request message as
     * received by the end server.
     *
     */
    const OK = 200;

    /**
     * The request has been fulfilled and resulted in a new resource
     * being created. The newly created resource can be referenced
     * by the URI(s) returned in the entity of the response, with the
     * most specific URI for the resource given by a Location header
     * field. The response SHOULD include an entity containing a list
     * of resource characteristics and location(s) from which the user
     * or user agent can choose the one most appropriate. The entity
     * format is specified by the media type given in the Content-Type
     * header field. The origin server MUST create the resource before
     * returning the 201 status code. If the action cannot be carried out
     * immediately, the server SHOULD respond with 202
     * (Accepted) response instead.
     *
     * A 201 response MAY contain an ETag response header field
     * indicating the current value of the entity tag for the requested
     * variant just created, see section 14.19.
     *
     */
    const CREATED = 201;

    /**
     * The request has been accepted for processing, but the
     * processing has not been completed. The request might
     * or might not eventually be acted upon, as it might be disallowed when
     * processing actually takes place. There is no facility for re-
     * sending a status code from an asynchronous operation such as
     * this.
     *
     * The 202 response is intentionally non-committal. Its purpose is
     * to allow a server to accept a request for some other process
     * (perhaps a batch-oriented process that is only run once per day)
     * without requiring that the user agent's connection to the server
     * persist until the process is completed. The entity returned with
     * this response SHOULD include an indication of the request's
     * current status and either a pointer to a status monitor or some
     * estimate of when the user can expect the request to be fulfilled.
     *
     */
    const ACCEPTED = 202;

    /**
     * The returned meta information in the entity-header is not the
     * definitive set as available from the origin server, but is gathered
     * from a local or a third-party copy. The set presented MAY be a
     * subset or superset of the original version. For example,
     * including local annotation information about the resource might
     * result in a superset of the meta information known by the origin
     * server. Use of this response code is not required and is only
     * appropriate when the response would otherwise be 200 (OK).
     *
     */
    const NON_AUTHORITATIVE_INFORMATION = 203;

    /**
     * The server has fulfilled the request but does not need to return
     * an entity-body, and might want to return updated
     * meta information. The response MAY include new or updated
     * meta information in the form of entity-headers, which if present
     * SHOULD be associated with the requested variant.
     *
     * If the client is a user agent, it SHOULD NOT change its
     * document view from that which caused the request to be sent.
     * This response is primarily intended to allow input for actions to
     * take place without causing a change to the user agent's active
     * document view, although any new or updated meta information
     * SHOULD be applied to the document currently in the user
     * agent's active view.
     *
     * The 204 response MUST NOT include a message-body, and
     * thus is always terminated by the first empty line after the header
     * fields.
     */
    const NO_CONTENT = 204;

    /**
     * The server has fulfilled the request and the user agent SHOULD
     * reset the document view which caused the request to be sent.
     * This response is primarily intended to allow input for actions to
     * take place via user input, followed by a clearing of the form in
     * which the input is given so that the user can easily initiate
     * another input action. The response MUST NOT include an
     * entity.
     *
     */
    const RESET_CONTENT = 205;

    /**
     * The server has fulfilled the partial GET request for the resource.
     * The request MUST have included a Range header field (section
     * 14.35) indicating the desired range, and MAY have included an
     * If-Range header field (section 14.27) to make the request
     * conditional.
     *
     * The response MUST include the following header fields:
     *
     *  - Either a Content-Range header field (section 14.16)
     *    indicating the range included with this response, or a
     *    multipart/byte ranges Content-Type including Content-
     *    Range fields for each part. If a Content-Length header field
     *    is present in the response, its value MUST match the actual
     *    number of OCTETs transmitted in the message-body.
     *  - Date
     *  - ETag and/or Content-Location, if the header would have
     *    been sent in a 200 response to the same request
     *  - Expires, Cache-Control, and/or Vary, if the field-value might
     *    differ from that sent in any previous response for the same
     *    variant
     *
     * If the 206 response is the result of an If-Range request that
     * used a strong cache validator (see section 13.3.3), the response
     * SHOULD NOT include other entity-headers. If the response is
     * the result of an If-Range request that used a weak validator, the
     * response MUST NOT include other entity-headers; this prevents
     * inconsistencies between cached entity-bodies and updated
     * headers. Otherwise, the response MUST include all of the
     * entity-headers that would have been returned with a 200 (OK)
     * response to the same request.
     *
     * A cache MUST NOT combine a 206 response with other
     * previously cached content if the ETag or Last-Modified headers
     * do not match exactly, see 13.5.4.
     *
     * A cache that does not support the Range and Content-Range
     * headers MUST NOT cache 206 (Partial) responses.
     *
     */
    const PARTIAL_CONTENT = 206;

    /**
     * The 207 (Multi-Status) status code provides status for multiple
     * independent operations (see section 11 for more information).
     */
    const MULTI_STATUS = 207;

    /**
     * The 208 (Already Reported) status code can be used inside a
     * DAV: propstat response element to avoid enumerating the
     * internal members of multiple bindings to the same collection
     * repeatedly. For each binding to a collection inside the request's
     * scope, only one will be reported with a 200 status, while
     * subsequent DAV:response elements for all other bindings will
     * use the 208 status, and no DAV:response elements for their
     * descendants are included.
     *
     */
    const ALREADY_REPORTED = 208;

    /**
     * The server has fulfilled a GET request for the resource, and the r
     * esponse is a representation of the result of one or more
     * instance-manipulations applied to the current instance. The
     * actual current instance might not be available except by
     * combining this response with other previous or future
     * responses, as appropriate for the specific instance-
     * manipulation(s). If so, the headers of the resulting instance are
     * the result of combining the headers from the status-226
     * response and the other instances, following the rules in section
     * 13.5.3 of the HTTP/1.1 specification.
     *
     * The request MUST have included an A-IM header field listing at
     * least one instance-manipulation. The response MUST include
     * an Etag header field giving the entity tag of the current instance.
     *
     * A response received with a status code of 226 MAY be stored
     * by a cache and used in reply to a subsequent request, subject
     * to the HTTP expiration mechanism and any Cache-Control
     * headers, and to the requirements in section 10.6.
     *
     * A response received with a status code of 226 MAY be used by
     * a cache, in conjunction with a cache entry for the base instance,
     * to create a cache entry for the current instance.
     *
     */
    const IM_USED = 226;

    /**
     * If the client has performed a conditional GET request and
     * access is allowed, but the document has not been modified,
     * the server SHOULD respond with this status code. The 304
     * response MUST NOT contain a message-body, and thus is always
     * terminated by the first empty line after the header fields.
     *
     * The response MUST include the following header fields:
     *
     *  Date, unless its omission is required by section 14.18.1
     *
     * If a clockless origin server obeys these rules, and proxies
     * and clients add their own Date to any response received without
     * one (as already specified by [RFC 2068], section 14.19),
     * caches will operate correctly.
     *
     * - ETag and/or Content-Location, if the header would have been
     *   sent in a 200 response to the same request
     * - Expires, Cache-Control, and/or Vary, if the field-value might
     *   differ from that sent in any previous response for the same
     *   variant
     *
     * If the conditional GET used a strong cache validator (see
     * section 13.3.3), the response SHOULD NOT include other
     * entity-headers. Otherwise (i.e., the conditional GET used a
     * weak validator), the response MUST NOT include other entity-
     * headers; this prevents inconsistencies between cached entity-
     * bodies and updated headers.
     *
     * If a 304 response indicates an entity not currently cached,
     * then the cache MUST disregard the response and repeat the
     * request without the conditional.
     *
     * If a cache uses a received 304 response to update a cache
     * entry, the cache MUST update the entry to reflect any new
     * field values given in the response.
     *
     */
    const NOT_MODIFIED = 304;

    /**
     * The request could not be understood by the server due to
     * malformed syntax. The client SHOULD NOT repeat the request
     * without modifications.
     */
    const BAD_REQUEST = 400;

    /**
     * The request requires user authentication. The response MUST
     * include a WWW-Authenticate header field (section 14.47)
     * containing a challenge applicable to the requested resource.
     * The client MAY repeat the request with a suitable Authorization
     * header field (section 14.8). If the request already included
     * Authorization credentials, then the 401 response indicates
     * that authorization has been refused for those credentials.
     * If the 401 response contains the same challenge as the
     * prior response, and the user agent has already attempted
     * authentication at least once, then the user SHOULD be presented
     * the entity that was given in the response, since that entity
     * might include relevant diagnostic information. HTTP access
     * authentication is explained in "HTTP Authentication: Basic and
     * Digest Access Authentication".
     */
    const UNAUTHORIZED = 401;

    /**
     * The server understood the request, but is refusing to fulfill
     * it. Authorization will not help and the request SHOULD NOT be
     * repeated. If the request method was not HEAD and the server
     * wishes to make public why the request has not been fulfilled,
     * it SHOULD describe the reason for the refusal in the entity.
     * If the server does not wish to make this information available
     * to the client, the status code 404 (Not Found) can be used instead.
     */
    const FORBIDDEN = 403;

    /**
     * The server has not found anything matching the Request-URI. No
     * indication is given of whether the condition is temporary or
     * permanent. The 410 (Gone) status code SHOULD be used if the
     * server knows, through some internally configurable mechanism,
     * that an old resource is permanently unavailable and has no
     * forwarding address. This status code is commonly used when the
     * server does not wish to reveal exactly why the request has been
     * refused, or when no other response is applicable.
     */
    const NOT_FOUND = 404;

    /**
     * The request could not be completed due to a conflict with the
     * current state of the resource. This code is only allowed in
     * situations where it is expected that the user might be able to
     * resolve the conflict and resubmit the request. The response
     * body SHOULD include enough information for the user to
     * recognize the source of the conflict. Ideally, the response entity
     * would include enough information for the user or user agent to
     * fix the problem; however, that might not be possible and is not
     * required.
     *
     * Conflicts are most likely to occur in response to a PUT request.
     * For example, if versioning were being used and the entity being
     * PUT included changes to a resource which conflict with those
     * made by an earlier (third-party) request, the server might use
     * the 409 response to indicate that it can't complete the request.
     * In this case, the response entity would likely contain a list of the
     * differences between the two versions in a format defined by the
     * response Content-Type.
     *
     */
    const CONFLICT = 409;

    /**
     * The server encountered an unexpected condition which prevented
     * it from fulfilling the request.
     */
    const INTERNAL_SERVER_ERROR = 500;

}
